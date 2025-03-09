<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Transaction;

class Program extends Component
{
    public $campaigns = [];
    public $campaignSettlementAmounts;
    public $campaign = "";
    public $slug;

    public function mount($slug = null)
    {
        $this->slug = $slug;
        if (!in_array($this->slug, ["wakaf", "pendidikan", "sosial", "lingkungan"])) {
            $this->campaigns = Campaign::getCampaignsPublished();
        } else {
            $this->campaigns = Campaign::getCampaignsPublishedByCategory($this->slug);
        }
        
        $this->campaignSettlementAmounts = Transaction::getSettlementAmount();
        $settlementAmounts = collect($this->campaignSettlementAmounts)
            ->keyBy('campaign_id')
            ->map(fn($item) => $item['total_gross_amount']);

        $this->campaigns = $this->campaigns->map(function ($campaign) use ($settlementAmounts) {
            $campaign->total_gross_amount = $settlementAmounts[$campaign->id] ?? 0;
            return $campaign; // 
        });

    }

    public function render()
    {
        return view('livewire.program');
    }
}
 