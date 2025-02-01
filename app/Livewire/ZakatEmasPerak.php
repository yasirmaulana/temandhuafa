<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatEmasPerak extends Component
{
    public $formattedEmasPerak;
    public $formattedHargaEmasPerak;
    public $wajibZakat;
    public $formattedJumlahBayar;
    public $jumlahBayar;

    public function render()
    {
        return view('livewire.zakat-emas-perak');
    }
}
