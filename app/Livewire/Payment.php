<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Payment extends Component
{

    public $paymentData;
    public $id;
    public $bank;
    public $statusMessage;
    public $statusError;

    public function mount()
    {
        $this->paymentData = session('midtrans_response');

        if(empty($this->paymentData)) { return redirect('/'); }

        $this->id = session('id');
        $banks = [
            'bni-va' => 'Bank BNI',
            'bri-va' => 'Bank BRI',
            'permata-va' => 'Bank Permata',
            'gopay' => 'Gopay',
            'channel' => 'Bank Mandiri',
        ];
        $this->bank = $banks[$this->id] ?? 'Unknown Bank';
    }

    public function render()
    {
        return view('livewire.payment'); 
    }

    public function checkPaymentStatus()
    {
        $orderId = $this->paymentData['order_id'] ?? null;
        if (!$orderId) {
            $message = 'Order ID tidak ditemukan.';
            $this->statusError = $message;
            $this->statusMessage = null;
            $this->dispatch('payment-status-checked', [
                'message' => $message,
                'type' => 'error',
            ]);
            return;
        }

        try {
            $transaction = Transaction::where('order_id', $orderId)->first();

            if (!$transaction) {
                $message = 'Data transaksi tidak ditemukan.';
                $this->statusError = $message;
                $this->statusMessage = null;
                $this->dispatch('payment-status-checked', [
                    'message' => $message,
                    'type' => 'error',
                ]);
                return;
            }

            $statusMessage = 'Status pembayaran: ' . ($transaction->transaction_status ?? 'tidak diketahui');

            $this->paymentData = array_merge($this->paymentData ?? [], [
                'transaction_id' => $transaction->transaction_id,
                'transaction_status' => $transaction->transaction_status,
                'transaction_time' => $transaction->transaction_time,
                'payment_type' => $transaction->payment_type,
                'gross_amount' => $transaction->gross_amount ?? ($this->paymentData['gross_amount'] ?? null),
                'fraud_status' => $transaction->fraud_status,
                'pdf_url' => $transaction->pdf_url,
            ]);

            session(['midtrans_response' => $this->paymentData]);

            $this->statusMessage = $statusMessage;
            $this->statusError = null;

            $this->dispatch('payment-status-checked', [
                'message' => $statusMessage,
                'status' => $transaction->transaction_status ?? null,
                'type' => 'success',
            ]);
        } catch (\Throwable $th) {
            Log::error('Gagal mengecek status pembayaran', [
                'order_id' => $orderId,
                'message' => $th->getMessage(),
            ]);

            $message = 'Terjadi kesalahan saat mengecek status pembayaran.';
            $this->statusError = $message;
            $this->statusMessage = null;
            $this->dispatch('payment-status-checked', [
                'message' => $message,
                'type' => 'error',
            ]);
        }
    }
}
