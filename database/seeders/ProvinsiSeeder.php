<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinsi = [
            ['provinsi' => 'Aceh'],
            ['provinsi' => 'Bali'],
            ['provinsi' => 'Bangka Belitung'],
            ['provinsi' => 'Banten'],
            ['provinsi' => 'Bengkulu'],
            ['provinsi' => 'DI Yogyakarta'],
            ['provinsi' => 'DKI Jakarta'],
            ['provinsi' => 'Gorontalo'],
            ['provinsi' => 'Jambi'],
            ['provinsi' => 'Jawa Barat'],
            ['provinsi' => 'Jawa Tengah'],
            ['provinsi' => 'Jawa Timur'],
            ['provinsi' => 'Kalimantan Barat'],
            ['provinsi' => 'Kalimantan Selatan'],
            ['provinsi' => 'Kalimantan Tengah'],
            ['provinsi' => 'Kalimantan Timur'],
            ['provinsi' => 'Kalimantan Utara'],
            ['provinsi' => 'Kepulauan Riau'],
            ['provinsi' => 'Lampung'],
            ['provinsi' => 'Maluku'],
            ['provinsi' => 'Maluku Utara'],
            ['provinsi' => 'Nusa Tenggara Barat'],
            ['provinsi' => 'Nusa Tenggara Timur'],
            ['provinsi' => 'Papua'],
            ['provinsi' => 'Papua Barat Daya'],
            ['provinsi' => 'Riau'],
            ['provinsi' => 'Sulawesi Selatan'],
            ['provinsi' => 'Sulawesi Tengah'],
            ['provinsi' => 'Sulawesi Tenggara'],
            ['provinsi' => 'Sulawesi Utara'],
            ['provinsi' => 'Sumatera Barat'],
            ['provinsi' => 'Sumatera Selatan'],
            ['provinsi' => 'Sumatera Utara'],
        ];
        
        DB::table('provinsis')->insert($provinsi);
        
    }
}
