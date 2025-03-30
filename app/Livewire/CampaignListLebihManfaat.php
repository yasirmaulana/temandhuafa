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

        $this->campaignSettlementAmounts = Transaction::getSettlementAmountGroupByFundraiser();

        $settlementAmounts = collect($this->campaignSettlementAmounts)
            ->keyBy('fundraiser_id')
            ->map(fn($item) => $item['total_gross_amount']);

        $this->fundraisers = $this->fundraisers->map(function ($fundraiser) use ($settlementAmounts) {
            $fundraiser->total_gross_amount = $settlementAmounts[$fundraiser->id] ?? 0;
            return $fundraiser; 
        });
        
        return view('livewire.campaign-list-lebih-manfaat');
    }
}
