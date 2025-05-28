<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Fundraiser;
use App\Models\Transaction;

class DashboardDonatur extends Component
{
    public $user, $transactions, $fundraiser_status, $total_donasi;
    public $fundraiser = [];

    public function render()
    {
        $this->user = Auth::user();
        
        $this->fundraiser = Fundraiser::getFundraiserByUserid($this->user->id);
        if (empty($this->fundraiser) || count($this->fundraiser) === 0) {
            $this->fundraiser_status = 'not register';
        } else {
            $this->fundraiser_status = $this->fundraiser[0]['register_status'] ?? 'unknown';
        }

        $this->transactions = Transaction::getTransactionByEmailUser($this->user->email);
        $this->total_donasi = Transaction::getSettlementAmountByEmail($this->user->email);
        // dd($this->total_donasi);
        return view('livewire.dashboard-donatur');
    }
}
