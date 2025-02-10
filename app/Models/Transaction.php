<?php

namespace App\Models;

use Illuminate\Support\Carbon;
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
    ];

    public function getRecord() {
        return Transaction::get();
    }

    public function getTransactionByEmail($email)
    {
        $transactions = $this->where('email', $email)->get();

        if($transactions->isEmpty()) {
            return null;
        }

        return $transactions;
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
