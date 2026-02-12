<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Events\DonationCreated;
use App\Helpers\MidtransIntegration;

class PaymentMethod extends Component
{
    public $paymentMethods;
    public $dataDonasi;
    public $infakSistem = true;
    public $infakSistemAmount;
    public $id;
    public $selectedMethod = false;

    public function mount()
    {
        $this->dataDonasi = session('donasi');

        if (empty($this->dataDonasi)) {
            return redirect('/');
        }

        $this->paymentMethods = [
            [
                'id' => 'gopay',
                'image' => 'assets/img/payment-method/qris.svg',
                'title' => 'QRIS - Gopay',
            ],
            [
                'id' => 'channel',
                'image' => 'assets/img/payment-method/mandiri.svg',
                'title' => 'Mandiri Virtual Account'
            ],
            [
                'id' => 'bni-va',
                'image' => 'assets/img/payment-method/bni.svg',
                'title' => 'BNI Virtual Account'
            ],
            [
                'id' => 'bri-va',
                'image' => 'assets/img/payment-method/bri.svg',
                'title' => 'BRI Virtual Account'
            ],
            [
                'id' => 'permata-va',
                'image' => 'assets/img/payment-method/permata.svg',
                'title' => 'Permata Virtual Account'
            ]
        ];
    }

    public function selectMethod($id)
    {
        if ($id == 'gopay') {
            $this->infakSistemAmount = 0.0205 * $this->dataDonasi['amount']; // Fee Gopay 2.05%
        } else {
            $this->infakSistemAmount = 4440; // Fee tetap Rp 4.000 + PPN 11%
        }
        $this->id = $id;
        $this->dataDonasi['payment_method'] = $id;
        $this->dataDonasi['infak_sistem'] = $this->infakSistemAmount;
        $this->selectedMethod = true;
    }

    public function togle()
    {
        if ($this->infakSistem) {
            $this->selectMethod($this->id);
        } else {
            $this->infakSistemAmount = 0;
        }
        $this->dataDonasi['infak_sistem'] = $this->infakSistemAmount;
    }

    public function createMidtransPayment()
    {
        try {
            $midtransResponse = MidtransIntegration::createCoreApiPayment($this->dataDonasi);

            if (isset($midtransResponse['status_code']) && !in_array($midtransResponse['status_code'], ['200', '201'])) {
                $errorMessage = $midtransResponse['status_message'] ?? 'Gagal membuat pembayaran. Silakan coba lagi.';
                $this->addError('payment', $errorMessage);
                return;
            }

            if (isset($midtransResponse['status']) && $midtransResponse['status'] === 'error') {
                $this->addError('payment', $midtransResponse['message'] ?? 'Terjadi kesalahan sistem.');
                return;
            }

            session(
                [
                    'midtrans_response' => $midtransResponse,
                    'id' => $this->id,
                ]
            );

            $this->createTransaction($midtransResponse);

            return redirect()->route('payment');
        } catch (\Exception $e) {
            \Log::error('PaymentMethod Exception: ' . $e->getMessage());
            $this->addError('payment', 'Terjadi kesalahan saat memproses pembayaran.');
        }
    }

    public function createTransaction($midtransResponse)
    {
        $grossAmount = $midtransResponse['gross_amount'] ?? $this->dataDonasi['amount'] + $this->infakSistemAmount;

        $transaction = Transaction::create([
            'order_id' => $this->dataDonasi['order_id'],
            'campaign_id' => $this->dataDonasi['campaign_id'] ?? null,
            'fundraiser_id' => $this->dataDonasi['fundraiser_id'] ?? null,
            'infaq_sistem' => $this->dataDonasi['infaq_sistem'],
            'donor_name' => $this->dataDonasi['donor_name'],
            'email' => $this->dataDonasi['email'],
            'phone' => $this->dataDonasi['phone'],
            'anonim' => $this->dataDonasi['anonim'],
            'pray' => $this->dataDonasi['pray'],
            'gross_amount' => $grossAmount,
            'amount' => $grossAmount - $this->infakSistemAmount,
        ]);

        DonationCreated::dispatch($transaction);
    }

    public function render()
    {
        return view('livewire.payment-method');
    }
}
