<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_laporan',
        'gambar',
        'judul',
        'penerima_manfaat',
        'lokasi_penyaluran',
        'deskripsi',
        'campaign_id',
    ];

    // Relasi ke model Campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    static public function getCampaignReportByCampaignId($campaignId)
    {
        return self::where('campaign_id', $campaignId)
            ->orderBy('tgl_laporan', 'desc')
            ->get();
    }
}
