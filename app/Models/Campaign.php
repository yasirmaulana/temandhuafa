<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Campaign extends Model 
{
    protected $fillable = [ 
        'image',
        'title',
        'category_id',
        'target_amount',
        'end_date',
        'description',
        'status', // pending, approved, rejected, completed
        'fundraiser_id',
        'start_date',
        'slug',
        'collected_amount',
        'is_delete',
    ];

    // Relationships
    public function fundraiser()
    {
        return $this->belongsTo(User::class, 'fundraiser_id');
    }

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
            get: fn($value) => url('/storage/assets/img/campaigns/' . $value),
        );
    }

    static public function getCampaigns()
    {
        // return Campaign::select('campaigns.*', 'categories.name as category_name', 'users.name as fundraiser_name')
        return Campaign::select('campaigns.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'campaigns.category_id')
            // ->join('users', 'users.id', '=', 'campaigns.fundraiser_id')
            ->where('campaigns.is_delete', '<>', 1)->get();
    }

    static public function getCampaignByUserId($userId)
    {
        return Campaign::where('is_delete', '<>', 1)
            ->where('fundraiser_id', '=', $userId)
            ->get();
    }

    static public function getSingle($id)
    {
        return Campaign::find($id);
    }

    static public function getCampaignBySlug($slug)
    {
        return Campaign::where('slug', $slug)->first();
    }

    static public function insertRecord($hashImage, $request)
    {
        $save = new Campaign;
        $save->image = $hashImage;
        $save->title = $request->title;
        $save->category_id = $request->category_id;
        $save->target_amount = $request->target_amount;
        $save->description = $request->description;
        $save->status = $request->status;
        $save->start_date = $request->start_date;
        $save->end_date = $request->end_date;
        $save->fundraiser_id = $request->fundraiser_id;
        $save->slug = $request->slug;
        $save->save();
    }

    static public function approve($id)
    {
        $update = Campaign::find($id);
        $update->status = "approved";
        $update->save();
    }

    static public function complate($id)
    {
        $update = Campaign::find($id);
        $update->status = "completed";
        $update->save();
    }

    static public function updateRecordWithoutImage($id, $request)
    {
        $save = Campaign::find($id);
        // dd($save);
        $save->title = $request->title;
        $save->category_id = $request->category_id;
        $save->target_amount = $request->target_amount;
        $save->description = $request->description;
        $save->status = $request->status;
        $save->start_date = $request->start_date;
        $save->end_date = $request->end_date;
        $save->fundraiser_id = $request->fundraiser_id;
        $save->slug = $request->slug;
        $save->save();
    }

    static public function updateRecord($id, $hashImage, $request)
    {
        $save = Campaign::find($id);
        $save->image = $hashImage;
        $save->title = $request->title;
        $save->category_id = $request->category_id;
        $save->target_amount = $request->target_amount;
        $save->description = $request->description;
        $save->status = $request->status;
        $save->start_date = $request->start_date;
        $save->end_date = $request->end_date;
        $save->fundraiser_id = $request->fundraiser_id;
        $save->slug = $request->slug;
        $save->save();
    }
}
