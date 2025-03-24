<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Auth;

class DashboardDonatur extends Component
{
    public $user, $transactions;

    public function render()
    {
        $this->user = Auth::user();
        // dd($this->user);

        $this->transactions = Transaction::getTransactionByEmailUser($this->user->email);
        // dd($this->transaksi);

        return view('livewire.dashboard-donatur');
    }
}
