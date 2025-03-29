<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Fundraiser;
use App\Models\Transaction;

class CampaignListLebihManfaat extends Component
{
    public $campaigns = [];
    public $campaignSettlementAmounts;
    public $campaign = "";

    public $fundraisers;


    public function render() 
    {
        $this->fundraisers = Fundraiser::all();

        // $this->campaigns = Campaign::getCampaignsPublished('lebih-manfaat');
        // $this->campaignSettlementAmounts = Transaction::getSettlementAmount();

        // $settlementAmounts = collect($this->campaignSettlementAmounts)
        //     ->keyBy('campaign_id')
        //     ->map(fn($item) => $item['total_gross_amount']);

        // $this->campaigns = $this->campaigns->map(function ($campaign) use ($settlementAmounts) {
        //     $campaign->total_gross_amount = $settlementAmounts[$campaign->id] ?? 0;
        //     return $campaign; 
        // });
        return view('livewire.campaign-list-lebih-manfaat');
    }

}
