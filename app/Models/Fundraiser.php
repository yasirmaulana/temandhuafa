<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fundraiser extends Model
{
    use HasFactory;

    protected $table = 'fundraisers';

    protected $fillable = [
        'nama_lembaga',
        'jenis_badan_usaha',
        'nomor_ijin',
        'nomor_kemenkumham',
        'kota_domisili',
        'provinsi',
        'alamat_lembaga',
        'nomor_rekening',
        'nama_rekening',
        'nama_bank',
        'nama_pimpinan',
        'nomor_hp_pimpinan',
        'email_pimpinan',
        'nama_bendahara',
        'nomor_hp_bendahara',
        'email_bendahara',
        'nama_pj',
        'nomor_pj',
        'email_pj',
        'cover',
        'file_legalitas',
        'file_kemenkumham',
        'file_rekening',
        'file_pernyataan',
        'file_struktur',
        'file_surat_tugas',
        'file_ktp',
        'register_status',
        'user_id',
    ];

    static public function getFundraiserByUserid($userid)
    {
        return self::where('user_id', $userid)->get();
    }

    static public function setRegisterStatus($userid)
    {
        return self::where('user_id', $userid)
            ->update(['register_status' => 'Active']);
    }
}
