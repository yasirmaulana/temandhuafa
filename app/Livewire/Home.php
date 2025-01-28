<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class Home extends Component
{
    public $campaigns = [];

    public $campaign = "";

    public function render()
    {
        return view('livewire.home');
    }

    public function mount()
    {
        $this->campaigns = Campaign::getCampaigns();
    }
}
