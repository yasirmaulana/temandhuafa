<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'target_amount',
        'collected_amount',
        'image',
        'start_date',
        'end_date',
        'status',
        'fundraiser_id'
    ];

    // Relationships
    // public function fundraiser()
    // {
    //     return $this->belongsTo(User::class, 'fundraiser_id');
    // }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // public function fundraiserReports()
    // {
    //     return $this->hasMany(FundraiserReport::class);
    // }

    // public function financialReports()
    // {
    //     return $this->hasMany(FinancialReport::class);
    // }

    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/campaigns/' . $value),
        );
    }
}
