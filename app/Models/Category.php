<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_active',
        'is_delete',
    ];

    // Relationships
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'category_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/assets/img/categories/' . $value),
        );
    }
    // end Relationships

    static public function getRecord()
    {
        return Category::get();
    }

    static public function getRecordActive()
    {
        return Category::where('is_active', '=', 1)->get();
    }

    static public function getSingle($id)
    {
        return Category::find($id);
    }

    static public function insertRecord($hashImage, $request)
    {
        $save = new Category;
        $save->image = $hashImage;
        $save->name = $request->name;
        $save->slug = Str::slug($request->name, '-');
        $save->is_active = 1;
        $save->save();
    }

    static public function updateRecordWithoutImage($id, $request)
    {
        $save = Category::find($id);
        $save->name = $request->name;
        $save->slug = Str::slug($request->name, '-');
        $save->is_active = $request->is_active;
        $save->save();
    }

    static public function updateRecord($id, $hashImage, $request)
    {
        $save = Category::find($id);
        $save->image = $hashImage;
        $save->name = $request->name;
        $save->slug = Str::slug($request->name, '-');
        $save->is_active = $request->is_active;
        $save->save();
    }
}
