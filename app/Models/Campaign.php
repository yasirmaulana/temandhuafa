<?php

namespace App\Models;

use Auth;
use Illuminate\Support\Facades\DB;
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
        'status', // draft, published, rejected, completed
        'fundraiser_id',
        'start_date',
        'slug',
        'collected_amount',
        'is_delete',
        'flag_campaign'
    ];

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

    static public function getCampaignsPublished($flagCampaign = null)
    {
        $query = Campaign::select('campaigns.*', 'categories.name as category_name', 'fundraisers.nama_lembaga as fundraiser', 'fundraisers.kota_domisili as domisili_fundraiser')
            ->join('categories', 'categories.id', '=', 'campaigns.category_id')
            ->join('fundraisers', 'fundraisers.id', '=', 'campaigns.fundraiser_id')
            ->where('status', 'published');; 

        if (!is_null($flagCampaign)) {
            $query->where('flag_campaign', $flagCampaign);
        }

        return $query->orderBy('campaigns.created_at', 'desc')->get();
    }

    static public function getCampaigns()
    {
        return Campaign::select('campaigns.*', 'categories.name as category_name', 'fundraisers.nama_lembaga as fundraiser')
            ->join('categories', 'categories.id', '=', 'campaigns.category_id')
            ->join('fundraisers', 'fundraisers.id', '=', 'campaigns.fundraiser_id')
            ->get();
    }

    static public function getCampaignByUserId($userId)
    {
        return Campaign::select('campaigns.*', 'categories.name as category_name', 'fundraisers.nama_lembaga as fundraiser')
            ->join('categories', 'categories.id', '=', 'campaigns.category_id')
            ->join('fundraisers', 'fundraisers.id', '=', 'campaigns.fundraiser_id')
            ->where('fundraiser_id', '=', $userId)
            ->get();
    }

    static public function getCampaignBySlug($slug)
    {
        return Campaign::select('campaigns.*', 'categories.name as category_name', 'fundraisers.nama_lembaga as fundraiser', 'fundraisers.kota_domisili as domisili_fundraiser')
            ->join('categories', 'categories.id', '=', 'campaigns.category_id')
            ->join('fundraisers', 'fundraisers.id', '=', 'campaigns.fundraiser_id')
            ->where('campaigns.slug', $slug)
            ->first();
    }

    static public function getSingle($id)
    {
        return Campaign::find($id);
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

    static public function complate($id)
    {
        $update = Campaign::find($id);
        $update->status = "completed";
        $update->save();
    }

    static public function updateRecordWithoutImage($id, $request)
    {
        if (Auth::user()->role_id == 1) {
            Campaign::where('id', $id)
                ->update(['status' => 'published']);
        } else {
            $save = Campaign::find($id);
            $save->title = $request->title;
            $save->category_id = $request->category_id;
            $save->target_amount = $request->target_amount;
            $save->description = $request->description;
            $save->status = $request->status;
            $save->start_date = $request->start_date;
            $save->end_date = $request->end_date;
            $save->slug = $request->slug;
            $save->save();
        }
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
