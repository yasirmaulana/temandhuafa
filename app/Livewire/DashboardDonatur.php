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
        $this->transactions = Transaction::getTransactionByEmailUser($this->user->email);

        return view('livewire.dashboard-donatur');
    }
}
