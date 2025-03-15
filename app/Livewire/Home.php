<?php

namespace App\Livewire;

use PostHog\PostHog;
use Livewire\Component;
use App\Models\Campaign;
use Illuminate\Http\Request;

class Home extends Component
{
    public $campaigns = [];
    public $campaign = "";
    public $category = '';

    public function mount(Request $request, $category = '')
    {
        $this->category = $category; 

        $this->campaigns = Campaign::getCampaignsPublished();

        // Tangkap data pengunjung
        PostHog::capture([
            'distinctId' => session()->getId(), // Gunakan session ID sebagai ID unik untuk guest
            'event' => 'User Visited Website',
            'properties' => [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->header('User-Agent'),
            ],
        ]);
    }
    
    public function render()
    {
        return view('livewire.home');
    }

    
}
