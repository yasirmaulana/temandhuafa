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
        'kota_domisili',
        'alamat_lembaga',
        'email_lembaga',
        'nomor_telpon',
        'nomor_ijin',
        'nomor_kemenkumham',
        'nomor_npwp',
        'nama_bank',
        'nomor_rekening',
        'nama_rekening',
        'image_ijin',
        'image_kemenkumham',
        'image_npwp',
        'image_buku_tabungan',
        'nama_pj',
        'tempat_lahir',
        'tanggal_lahir',
        'email_pj',
        'nomor_pj',
        'jabatan',
        'nama_pimpinan',
        'nomor_hp_pimpinan',
        'nama_bendahara',
        'nomor_hp_bendahara',
        'image_doc_pj',
        'image_struktur_org',
        'image_ktp',
        'register_status',
        'user_id'
    ];

    static public function getFundraiserByUserid($userid)
    {
        return Fundraiser::where('user_id', $userid)->get();
    }

    static public function setRegisterStatus($userid)
    {
        return Fundraiser::where('user_id', $userid)
            ->update(['register_status' => 'Active']);
    }
}
