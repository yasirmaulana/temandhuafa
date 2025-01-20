<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Donation extends Model
{
    protected $fillable = [
        'invoice',
        'campaign_id',
        'amount',
        'pray',
        'snap_token',
        'message',
        'status',
        'infaq_sistem',
        'donor_name',
        'email',
        'phone',
        'anonim',
    ];

    // Relationships
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

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
