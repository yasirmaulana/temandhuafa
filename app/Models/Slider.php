<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Slider extends Model
{
    protected $fillable = [
        'image',
        'link',
        'is_active',
        'is_delete',
    ];

    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/assets/img/sliders/' . $value),
        );
    }

    static public function getRecord()
    {
        return Slider::get();
    }

    static public function getSingle($id)
    {
        return Slider::find($id);
    }

    static public function insertRecord($hashImage, $request)
    {
        $save = new Slider();
        $save->image = $hashImage;
        $save->link = $request->link;
        $save->is_active = 1;
        $save->save();
    }

    static public function updateRecordWithoutImage($id, $request)
    {
        $save = Slider::find($id);
        $save->link = $request->link;
        $save->is_active = $request->is_active;
        $save->save();
    }

    static public function updateRecord($id, $hashImage, $request)
    {
        $save = Slider::find($id);
        $save->image = $hashImage;
        $save->link = $request->link;
        $save->is_active = $request->is_active;
        $save->save();
    }
}
