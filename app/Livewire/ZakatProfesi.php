<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatProfesi extends Component
{
    public $campaign;
    public $hartaTabungan = 0;
    public $hartaLM = 0;
    public $hartaSuratBerharga = 0;
    public $hartaProperti = 0;
    public $hartaKendaraan = 0;
    public $hartaBarangAntik = 0;
    public $hartaBarangDagang = 0;
    public $hartaLainnya = 0;
    public $hartaPiutangLancar = 0;
    public $jumlahHarta = 0;
    public $hutangJatuhTempo = 0;
    public $hartaDihitungZakat = 0;
    public $hargaEmas = 0;
    public $nisab = 0;
    public $wajibZakat = "";
    public $persen = 2.5;
    public $jumlahBayar = 0;

    public function mount()
    {
        $this->recalculateAll();
    }

    public function updated($propertyName)
    {
        $numericProperties = [
            'hartaTabungan',
            'hartaLM',
            'hartaSuratBerharga',
            'hartaProperti',
            'hartaKendaraan',
            'hartaBarangAntik',
            'hartaBarangDagang',
            'hartaLainnya',
            'hartaPiutangLancar',
            'hutangJatuhTempo',
            'hargaEmas',
            'persen'
        ];

        if (in_array($propertyName, $numericProperties)) {
            $this->$propertyName = is_numeric($this->$propertyName) ? (float)$this->$propertyName : 0;
            $this->recalculateAll();
        }
    }

    public function updatedPersen()
    {
        $this->calculateJumlahBayar();
    }

    private function recalculateAll()
    {
        $this->calculateTotalHarta();
        $this->calculateHartaDihitungZakat();
        $this->calculateNisab();
        $this->determineWajibZakat();
        $this->calculateJumlahBayar();
    }

    private function calculateTotalHarta()
    {
        $this->jumlahHarta =
            ($this->hartaTabungan ?? 0) +
            ($this->hartaLM ?? 0) +
            ($this->hartaSuratBerharga ?? 0) +
            ($this->hartaProperti ?? 0) +
            ($this->hartaKendaraan ?? 0) +
            ($this->hartaBarangAntik ?? 0) +
            ($this->hartaBarangDagang ?? 0) +
            ($this->hartaLainnya ?? 0) +
            ($this->hartaPiutangLancar ?? 0);
    }

    private function calculateHartaDihitungZakat()
    {
        $this->hartaDihitungZakat = $this->jumlahHarta - $this->hutangJatuhTempo;
    }

    private function calculateNisab()
    {
        $this->nisab = $this->hargaEmas * 85;
    }

    private function determineWajibZakat()
    {
        if ($this->hargaEmas >= 900000) {
            $this->wajibZakat = $this->hartaDihitungZakat >= $this->nisab ? "Ya" : "Tidak";
        }
    }

    private function calculateJumlahBayar()
    {
        if ($this->wajibZakat === "Ya") {
            $this->jumlahBayar = ceil($this->hartaDihitungZakat * ($this->persen / 100));
        } else {
            $this->jumlahBayar = 0;
        }
    }

    public function render()
    {
        return view('livewire.zakat-profesi');
    }
}
