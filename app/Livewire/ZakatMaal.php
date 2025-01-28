<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatMaal extends Component
{
    public $campaign;
    public $hartaTabungan;
    public $formattedHartaTabungan;

    public $hartaLM;
    public $hartaSuratBerharga;
    public $hartaProperti;
    public $hartaKendaraan;
    public $hartaBarangAntik;
    public $hartaBarangDagang;
    public $hartaLainnya;
    public $hartaPiutangLancar;
    public $jumlahHarta;
    public $hutangJatuhTempo;
    public $hartaDihitungZakat;
    public $hargaEmas;
    public $nisab;
    public $wajibZakat = "";
    public $persen = 2.5;
    public $jumlahBayar;

    public function updatedFormattedHartaTabungan($value)
    {
        $this->hartaTabungan = (int) str_replace('.', '', $value);
        $this->formattedHartaTabungan = number_format((int) $this->hartaTabungan, 0, '', '.');
        $this->updated('hartaTabungan');
    }

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
        return view('livewire.zakat-maal');
    }
}
