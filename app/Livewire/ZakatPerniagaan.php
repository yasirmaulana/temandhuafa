<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatPerniagaan extends Component
{
    public $formattedLabaBersih;
    public $labaBersih;
    public $formattedHargaEmas;
    public $hargaEmas;
    public $wajibZakat;
    public $formattedJumlahBayar;
    public $jumlahBayar;

    public function updatedFormattedLabaBersih($value)
    {
        $this->labaBersih = (int) str_replace('.', '', $value);
        $this->formattedLabaBersih = number_format((int) $this->labaBersih, 0, '', '.');
        $this->updated('labaBersih');
    }

    public function updatedFormattedHargaEmas($value)
    {
        $this->hargaEmas = (int) str_replace('.', '', $value);
        $this->formattedHargaEmas = number_format($this->hargaEmas, 0, '', '.');
        $this->updated('hargaEmas');
    }

    public function mount()
    {
        $this->recalculateAll();
        $this->wajibZakat = "";
    }

    public function updated($propertyName)
    {

        $numericProperties = [
            'labaBersih',
            'hargaEmas',
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
        if($this->hargaEmas > 900000) {
            $this->wajibZakat = ($this->labaBersih >= ($this->hargaEmas*85)) ? 'Ya' : 'Tidak';
        } else {
            $this->wajibZakat = "";
        }
    }

    private function calculateJumlahBayar()
    {
        if ($this->wajibZakat == 'Ya') {
            $this->jumlahBayar = $this->labaBersih * 0.025;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        } else {
            $this->jumlahBayar = 0;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');  
        }
    }

    public function render()
    {
        return view('livewire.zakat-perniagaan');
    }
}
