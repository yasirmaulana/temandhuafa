<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['provinsi'];

    public function kotas()
    {
        return $this->hasMany(Kota::class);
    }

}
