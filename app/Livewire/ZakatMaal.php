<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatMaal extends Component
{
    public $campaign;
    public $hartaTabungan;
    public $formattedHartaTabungan;
    public $hartaLM;
    public $formattedHartaLM;
    public $hartaSuratBerharga;
    public $formattedHartaSuratBerharga;
    public $hartaProperti;
    public $formattedHartaProperti;
    public $hartaKendaraan;
    public $formattedHartaKendaraan;
    public $hartaBarangAntik;
    public $formattedHartaBarangAntik;
    public $hartaBarangDagang;
    public $formattedHartaBarangDagang;
    public $hartaLainnya;
    public $formattedHartaLainnya;
    public $hartaPiutangLancar;
    public $formattedHartaPiutangLancar;
    public $jumlahHarta;
    public $formattedJumlahHarta;
    public $hutangJatuhTempo;
    public $formattedHutangJatuhTempo;
    public $hartaDihitungZakat;
    public $formattedHartaDihitungZakat;
    public $hargaEmas;
    public $formattedHargaEmas;
    public $nisab;
    public $formattedNisab;
    public $jumlahBayar;
    public $formattedJumlahBayar;
    public $wajibZakat = "";
    public $persen = 2.5;

    public function updatedFormattedHartaTabungan($value)
    {
        $this->hartaTabungan = (int) str_replace('.', '', $value);
        $this->formattedHartaTabungan = number_format((int) $this->hartaTabungan, 0, '', '.');
        $this->updated('hartaTabungan');
    }

    public function updatedFormattedHartaLM($value)
    {
        $this->hartaLM = (int) str_replace('.', '', $value);
        $this->formattedHartaLM = number_format((int) $this->hartaLM, 0, '', '.');
        $this->updated('hartaLM');
    }

    public function updatedFormattedHartaSuratBerharga($value)
    {
        $this->hartaSuratBerharga = (int) str_replace('.', '', $value);
        $this->formattedHartaSuratBerharga = number_format((int) $this->hartaSuratBerharga, 0, '', '.');
        $this->updated('hartaSuratBerharga');
    }

    public function updatedFormattedHartaProperti($value)
    {
        $this->hartaProperti = (int) str_replace('.', '', $value);
        $this->formattedHartaProperti = number_format((int) $this->hartaProperti, 0, '', '.');
        $this->updated('hartaProperti');
    }

    public function updatedFormattedHartaKendaraan($value)
    {
        $this->hartaKendaraan = (int) str_replace('.', '', $value);
        $this->formattedHartaKendaraan = number_format((int) $this->hartaKendaraan, 0, '', '.');
        $this->updated('hartaKendaraan');
    }

    public function updatedFormattedHartaBarangAntik($value)
    {
        $this->hartaBarangAntik = (int) str_replace('.', '', $value);
        $this->formattedHartaBarangAntik = number_format((int) $this->hartaBarangAntik, 0, '', '.');
        $this->updated('hartaBarangAntik');
    }

    public function updatedFormattedHartaBarangDagang($value)
    {
        $this->hartaBarangDagang = (int) str_replace('.', '', $value);
        $this->formattedHartaBarangDagang = number_format((int) $this->hartaBarangDagang, 0, '', '.');
        $this->updated('hartaBarangDagang');
    }

    public function updatedFormattedHartaLainnya($value)
    {
        $this->hartaLainnya = (int) str_replace('.', '', $value);
        $this->formattedHartaLainnya = number_format((int) $this->hartaLainnya, 0, '', '.');
        $this->updated('hartaLainnya');
    }

    public function updatedFormattedHartaPiutangLancar($value)
    {
        $this->hartaPiutangLancar = (int) str_replace('.', '', $value);
        $this->formattedHartaPiutangLancar = number_format((int) $this->hartaPiutangLancar, 0, '', '.');
        $this->updated('hartaPiutangLancar');
    }

    public function updatedFormattedHutangJatuhTempo($value)
    {
        $this->hutangJatuhTempo = (int) str_replace('.', '', $value);
        $this->formattedHutangJatuhTempo = number_format((int) $this->hutangJatuhTempo, 0, '', '.');
        $this->updated('hutangJatuhTempo');
    }

    public function updatedFormattedHartaDihitungZakat($value)
    {
        $this->hartaDihitungZakat = (int) str_replace('.', '', $value);
        $this->formattedHartaDihitungZakat = number_format((int) $this->hartaDihitungZakat, 0, '', '.');
        $this->updated('hartaDihitungZakat');
    }

    public function updatedFormattedHargaEmas($value)
    {
        $this->hargaEmas = (int) str_replace('.', '', $value);
        $this->formattedHargaEmas = number_format((int) $this->hargaEmas, 0, '', '.');
        $this->updated('hargaEmas');
    }

    public function updatedFormattedNisab($value)
    {
        $this->nisab = (int) str_replace('.', '', $value);
        $this->formattedNisab = number_format((int) $this->nisab, 0, '', '.');
        $this->updated('nisab');
    }

    public function updatedFormattedJumlahBayar($value)
    {
        $this->jumlahBayar = (int) str_replace('.', '', $value);
        $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        $this->updated('jumlahBayar');
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

        $this->formattedJumlahHarta = number_format((int) $this->jumlahHarta, 0, '', '.');
    }

    private function calculateHartaDihitungZakat()
    {
        $this->hartaDihitungZakat = $this->jumlahHarta - $this->hutangJatuhTempo;
        $this->formattedHartaDihitungZakat = number_format((int) $this->hartaDihitungZakat, 0, '', '.');
    }

    private function calculateNisab()
    {
        $this->nisab = $this->hargaEmas * 85;
        $this->formattedNisab = number_format((int) $this->nisab, 0, '', '.');
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
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        } else {
            $this->jumlahBayar = 0;
        }
    }

    public function render()
    {
        return view('livewire.zakat-maal');
    }
}
