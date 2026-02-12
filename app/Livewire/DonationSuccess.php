<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class DonationSuccess extends Component
{
    public $orderId;
    public $transaction;

    public function mount($order_id)
    {
        $this->orderId = $order_id;
        $this->transaction = Transaction::select('transactions.*', 'campaigns.title as campaign_title')
            ->leftJoin('campaigns', 'campaigns.id', '=', 'transactions.campaign_id')
            ->where('order_id', $this->orderId)
            ->first();

        if (!$this->transaction || $this->transaction->transaction_status !== 'settlement') {
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.donation-success')
            ->layout('components.layouts.app');
    }
}
