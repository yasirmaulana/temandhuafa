<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class Checkout extends Component
{

    public $campaign;

    public function mount($slug)
    {
        $this->campaign = Campaign::getCampaignBySlug($slug);
    }

    public function render()
    {
        return view('livewire.front.checkout');
    }
}
