<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use Illuminate\Http\Request;

class Checkout extends Component
{
    // #[Title('Checkout')]

    public $campaign;
    public $campaignId;
    public $amount = 0;
    public $infaqSistem = true;
    public $namaLengkap = '';
    public $email = '';
    public $phone = '';
    public $anonim = false;
    public $doa = '';
    public $infaqSistemAmount = 0;
    public $totalAmount = 0;
    public $snapToken = '';

    public function mount($slug)
    {
        $this->campaign = Campaign::getCampaignBySlug($slug);
        $this->campaignId = $this->campaign->id;
        $this->infaqSistemAmount = 2000;
        $this->totalAmount = $this->infaqSistemAmount;
    }

    public function render()
    {
        return view('livewire.front.checkout');
    }

    public function createPayment()
    {

        try {
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');
            \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
            \Midtrans\Config::$is3ds = config("midtrans.is3ds");

            $params = [
                'transaction_details' => [
                    'order_id' => rand(),
                    'gross_amount' => $this->totalAmount,
                ],
                'customer_details' => [
                    'first_name' => $this->namaLengkap,
                    'email' => $this->email,
                    'phone' => $this->phone
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // Redirect ke halaman Payment dengan Snap Token
            return redirect()->route('payment', ['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            logger()->error('Error generating snapToken: ' . $e->getMessage());
            $this->addError('snapToken', 'Gagal mendapatkan Snap Token. Silakan coba lagi.');
        }
    }

    // public function updatedSnapToken($value)
    // {
    //     if (!empty($value)) {
    //         $this->dispatch('updateSnapToken', ['snapToken' => $value]);
    //     }
    // }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        $this->totalAmount = $this->infaqSistemAmount + $this->amount;
    }

    public function togle()
    {
        if ($this->infaqSistem) {
            $this->infaqSistemAmount = 2000;
        } else {
            $this->infaqSistemAmount = 0;
        }
        $this->totalAmount = $this->amount + $this->infaqSistemAmount; // Tambahkan 2000
    }

    public function updatedAmount($value)
    {
        $this->totalAmount = $this->infaqSistemAmount + (int)$value;
    }
}
