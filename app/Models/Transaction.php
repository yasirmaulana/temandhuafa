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
        return \Illuminate\Support\Facades\Cache::remember('settlement_amounts_all', 60, function () {
            return self::select('campaign_id', DB::raw('SUM(amount) as total_gross_amount'), DB::raw('COUNT(amount) as total_donatur'))
                ->where('transaction_status', 'settlement')
                ->groupBy('campaign_id')
                ->get();
        });
    }

    static public function getSettlementAmountGroupByFundraiser()
    {
        return \Illuminate\Support\Facades\Cache::remember('settlement_amounts_by_fundraiser', 60, function () {
            return self::select('fundraiser_id', DB::raw('SUM(amount) as total_gross_amount'), DB::raw('COUNT(amount) as total_donatur'))
                ->where('transaction_status', 'settlement')
                ->groupBy('fundraiser_id')
                ->get();
        });
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
            ->leftJoin('campaigns', 'campaigns.id', '=', 'transactions.campaign_id')
            ->where('transactions.email', $email)
            ->orderBy('transactions.created_at', 'desc')
            ->get();
    }

    protected function programName(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (!empty($attributes['campaign_title'])) {
                    return $attributes['campaign_title'];
                }

                $orderId = $attributes['order_id'] ?? '';
                $type = explode('-', $orderId)[0] ?? '';

                $mapTitle = [
                    "infaq" => "Infak",
                    "emas" => "Zakat Emas",
                    "perak" => "Zakat Perak",
                    "pertanian" => "Zakat Pertanian",
                    "peternakan" => "Zakat Peternakan",
                    "maal" => "Zakat Maal",
                    "perniagaan" => "Zakat Perniagaan",
                    "penghasilan" => "Zakat Penghasilan",
                    "fidyah" => "Fidyah",
                    "kafarat" => "Kafarat",
                ];

                return $mapTitle[$type] ?? 'Infak/Zakat';
            },
        );
    }

    static public function getSettlementAmountByEmail($email)
    {
        return self::select('email', DB::raw('SUM(amount) as total_amount'), DB::raw('COUNT(amount) as total_donatur'))
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
