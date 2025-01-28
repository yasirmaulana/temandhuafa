<?php

namespace App\Livewire;

use App\Models\Campaign;
use Livewire\Component;

class CampaignDetail extends Component
{
    public $campaign;

    public function mount($slug)
    {
        $this->campaign = Campaign::getCampaignBySlug($slug);
    }

    public function render()
    {
        return view('livewire.campaign-detail');
    }
}
