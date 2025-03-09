<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatPertanian extends Component
{
    public $selectedHasilPertanian;
    public $wajibZakat;
    public $formattedJumlahHasilPertanian;
    public $jumlahHasilPertanian;
    public $perairan;
    public $formattedHargaJual;
    public $hargaJual;
    public $formattedJumlahBayar;
    public $jumlahBayar;

    public function updatedFormattedJumlahHasilPertanian($value)
    {
        $this->jumlahHasilPertanian = (int) str_replace('.', '', $value);
        $this->formattedJumlahHasilPertanian = number_format((int) $this->jumlahHasilPertanian, 0, '', '.');
        $this->updated('jumlahHasilPertanian');
    }

    public function updatedFormattedHargaJual($value)
    {
        $this->hargaJual = (int) str_replace('.', '', $value);
        $this->formattedHargaJual = number_format((int) $this->hargaJual, 0, '', '.');
        $this->updated('hargaJual');
    }

    public function updatedPerairan($value)
    {
        $this->recalculateAll();
        $this->perairan = (string) $value;
    }


    public function mount()
    {
        $this->selectedHasilPertanian = "gabah";
        $this->perairan = "berbayar";
        $this->wajibZakat = "";

        $this->recalculateAll();
    }

    public function updated($propertyName)
    {

        $numericProperties = [
            'jumlahHasilPertanian',
            'perairan', 
            'hargaJual',
        ];

        if (in_array($propertyName, $numericProperties)) {
            $this->$propertyName = is_numeric($this->$propertyName) ? (float)$this->$propertyName : 0;
            $this->recalculateAll();
        }
    }

    private function recalculateAll()
    {
        $this->determineWajibZakat();
        $this->calculateJumlahBayar();
    }

    private function determineWajibZakat()
    {
        if($this->jumlahHasilPertanian > 0) {
            if ($this->selectedHasilPertanian == 'gabah') {
                $this->wajibZakat = ($this->jumlahHasilPertanian >= 847) ? 'Ya' : 'Tidak';
            } else {
                $this->wajibZakat = ($this->jumlahHasilPertanian >= 207) ? 'Ya' : 'Tidak';
            }
        }
    }

    private function calculateJumlahBayar()
    {
        if ($this->perairan == 'berbayar') {
            $this->jumlahBayar = ($this->jumlahHasilPertanian * $this->hargaJual) * 0.05;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        } else {
            $this->jumlahBayar = ($this->jumlahHasilPertanian * $this->hargaJual) * 0.1;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        }
    }

    public function render()
    {
        return view('livewire.zakat-pertanian');
    }
}
