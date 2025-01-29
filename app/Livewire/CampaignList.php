<?php

namespace App\Livewire;

use App\Models\Campaign;
use Livewire\Component;

class CampaignList extends Component
{

    public $campaigns = [];
    public $campaign = "";

    public function mount()
    {
        $this->campaigns = Campaign::getCampaigns();
    }

    public function render()
    {
        return view('livewire.campaign-list');
    }
    
}
