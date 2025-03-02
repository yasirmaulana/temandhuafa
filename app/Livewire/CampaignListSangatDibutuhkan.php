<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Transaction;

class CampaignListSangatDibutuhkan extends Component
{
    public $campaigns = [];
    public $campaignSettlementAmounts;
    public $campaign = "";

    public function mount()
    {
        $this->campaigns = Campaign::getCampaignsPublished('sangat-dibutuhkan');
        $this->campaignSettlementAmounts = Transaction::getSettlementAmount();

        $settlementAmounts = collect($this->campaignSettlementAmounts)
            ->keyBy('campaign_id')
            ->map(fn($item) => $item['total_gross_amount']);

        $this->campaigns = $this->campaigns->map(function ($campaign) use ($settlementAmounts) {
            $campaign->total_gross_amount = $settlementAmounts[$campaign->id] ?? 0;
            return $campaign; 
        });

        // dd($this->campaigns);
    }

    public function render()
    {
        return view('livewire.campaign-list-sangat-dibutuhkan'); 
    }
}
