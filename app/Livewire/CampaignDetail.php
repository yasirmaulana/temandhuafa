<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\LaporanCampaign;
use App\Models\Transaction;

class CampaignDetail extends Component
{
    public $campaign;
    public $campaignReport;
    public $campaignSettlementAmounts;
    public $transactions;

    public function mount($slug)
    {
        $this->campaign = Campaign::getCampaignBySlug($slug);
        $this->campaignReport = LaporanCampaign::getCampaignReportByCampaignId($this->campaign->id);
        $this->campaignSettlementAmounts = Transaction::getSettlementAmount();

        $settlementAmounts = collect($this->campaignSettlementAmounts)
            ->keyBy('campaign_id'); 

        if (isset($settlementAmounts[$this->campaign->id])) {
            $this->campaign->total_gross_amount = $settlementAmounts[$this->campaign->id]['total_gross_amount'] ?? 0;
            $this->campaign->total_donatur = $settlementAmounts[$this->campaign->id]['total_donatur'] ?? 0;
        } else {
            $this->campaign->total_gross_amount = 0;
            $this->campaign->total_donatur = 0;
        }

        $this->transactions = Transaction::getTransactionByCampaignId($this->campaign->id);
        // dd($this->transactions);
    }

    public function render()
    {
        return view('livewire.campaign-detail');
    }
}
