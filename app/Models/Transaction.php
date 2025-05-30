<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'transaction_id',
        'gross_amount',
        'payment_type',
        'transaction_time',
        'transaction_status',
        'fraud_status',
        'pdf_url',
        'campaign_id',
        'fundraiser_id',
        'infaq_sistem',
        'donor_name',
        'email',
        'phone',
        'anonim',
        'pray',
        'amount',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }


    // Relationships
    // public function campaign()
    // {
    //     return $this->belongsTo(Campaign::class);
    // }

    // public function donor()
    // {
    //     return $this->belongsTo(User::class, 'donor_id');
    // }


    public function getTransaction()
    {
        return $this->select('transactions.*', 'campaigns.title as campaign_title')
            ->leftJoin('campaigns', 'campaigns.id', '=', 'transactions.campaign_id')
            ->get();
    }

    public function getTransactionByEmail($email)
    {
        $transactions = $this->select('transactions.*', 'campaigns.title as campaign_title')
            ->leftJoin('campaigns', 'campaigns.id', '=', 'transactions.campaign_id')
            ->where('email', $email)
            ->get();

        if ($transactions->isEmpty()) {
            return null;
        }

        return $transactions;
    }

    static public function getSettlementAmount()
    {
        return self::select('campaign_id', DB::raw('SUM(amount) as total_gross_amount'), DB::raw('COUNT(amount) as total_donatur'))
            ->where('transaction_status', 'settlement')
            ->groupBy('campaign_id')
            ->get();
    }

    static public function getSettlementAmountGroupByFundraiser()
    {
        return self::select('fundraiser_id', DB::raw('SUM(amount) as total_gross_amount'), DB::raw('COUNT(amount) as total_donatur'))
            ->where('transaction_status', 'settlement')
            ->groupBy('fundraiser_id')
            ->get();
    }

    static public function getTransactionByCampaignId($campaignId)
    {
        return self::where('campaign_id', $campaignId)
            ->where('transaction_status', 'settlement')
            ->get();
    }

    static public function getTransactionByEmailUser($email)
    {
        return self::select('transactions.*', 'campaigns.title as campaign_title')
            ->join('campaigns', 'campaigns.id', '=', 'transactions.campaign_id')
            ->where('transactions.email', $email)
            ->get();
    }

    static public function getSettlementAmountByEmail($email)
    {
        return self::select('email', DB::raw('SUM(gross_amount) as total_gross_amount'), DB::raw('COUNT(gross_amount) as total_donatur'))
            ->where('transaction_status', 'settlement')
            ->where('email', $email)
            ->groupBy('email')
            ->first();
    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }
}
