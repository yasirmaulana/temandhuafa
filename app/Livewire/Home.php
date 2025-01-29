<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class Home extends Component
{
    public $campaigns = [];
    public $campaign = "";
    public $category = '';

    public function mount($category = '')
    {
        $this->category = $category;

        $this->campaigns = Campaign::getCampaigns();
    }
    
    public function render()
    {
        return view('livewire.home');
    }

    
}
