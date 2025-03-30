<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Fundraiser;
use App\Models\Transaction;

class FundraiserDetail extends Component
{

    public $fundraiser, $user, $campaigns, $campaignSettlementAmounts, $campaignSettlementGrossAmounts, $campaignComplateds;

    public function mount($slug) {

        $this->fundraiser = Fundraiser::where('slug', $slug)->firstOrFail();
        $this->user = User::getSingle($this->fundraiser->user_id);
        $this->campaignSettlementAmounts = Transaction::getSettlementAmountGroupByFundraiser();

        $settlementAmounts = collect($this->campaignSettlementAmounts)
            ->keyBy('fundraiser_id');
            
        if (isset($settlementAmounts[$this->fundraiser->id])) {
            $this->fundraiser->total_gross_amount = $settlementAmounts[$this->fundraiser->id]['total_gross_amount'] ?? 0;
            $this->fundraiser->total_donatur = $settlementAmounts[$this->fundraiser->id]['total_donatur'] ?? 0;
        } else {
            $this->fundraiser->total_gross_amount = 0;
            $this->fundraiser->total_donatur = 0;
        }

        $this->campaigns = Campaign::getCampaignsPublishedByFundraiser($this->fundraiser->id);
        $this->campaignSettlementGrossAmounts = Transaction::getSettlementAmount();

        $settlementAmounts = collect($this->campaignSettlementGrossAmounts)
            ->keyBy('campaign_id')
            ->map(fn($item) => $item['total_gross_amount']);

        $this->campaigns = $this->campaigns->map(function ($campaign) use ($settlementAmounts) {
            $campaign->total_gross_amount = $settlementAmounts[$campaign->id] ?? 0;
            return $campaign;
        });

        $this->campaignComplateds = Campaign::getCampaignsComplatedByFundraiser($this->fundraiser->id);

    }

    public function render()
    {
        return view('livewire.fundraiser');
    }
}
