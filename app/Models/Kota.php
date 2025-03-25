<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kota', 'provinsi'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    static public function getKotaByProvinsi($provinsi) {
        return self::where('provinsi', $provinsi)->get();
    }
}
