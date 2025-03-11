<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatPeternakan extends Component
{
    public $selectedTernak;
    public $formattedJumlahTernak;
    public $jumlahTernak;
    public $wajibZakat;
    public $formattedTernak;
    public $formattedJumlahBayar;

    public function mount()
    {
        $this->wajibZakat = "";

        $this->recalculateAll();
    }

    private function recalculateAll()
    {
        $this->determineWajibZakat();
        $this->calculateJumlahBayar();
    }

    private function determineWajibZakat()
    {
        if ($this->selectedTernak == 'sapi') {
            $this->wajibZakat = ($this->jumlahTernak >= 30) ? 'Ya' : 'Tidak';
        } else {
            $this->wajibZakat = ($this->jumlahTernak >= 40) ? 'Ya' : 'Tidak';
        }
    }

    private function calculateJumlahBayar()
    {
        if($this->wajibZakat == 'Ya') {
            $this->jumlahBayar = ($this->emasPerak * $this->hargaEmasPerak) * 0.025;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        } else {
            $this->jumlahBayar = 0;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');    
        }
    }


    public function updatedFormattedJumlahTernak($value)
    {
        $this->jumlahTernak = (int) str_replace('.', '', $value);
        $this->formattedJumlahTernak = number_format((int) $this->jumlahTernak, 0, '', '.');
        $this->updated('jumlahTernak');
    }



    
    public $selectedLogam;
    public $formattedEmasPerak;
    public $formattedHargaEmasPerak;
    public $emasPerak;
    public $hargaEmasPerak;
    public $jumlahBayar;
    public $perairan;

    public function updatedSelectedTernak()
    {
        $this->dispatch('$refresh');
    }

    public function updatedFormattedEmasPerak($value)
    {
        $this->emasPerak = (int) str_replace('.', '', $value);
        $this->formattedEmasPerak = number_format((int) $this->emasPerak, 0, '', '.');
        $this->updated('emasPerak');
    }

    public function updatedFormattedHargaEmasPerak($value)
    {
        if (!empty($value) && is_numeric(str_replace('.', '', $value))) {
            $this->hargaEmasPerak = (int) str_replace('.', '', $value);
        } else {
            $this->hargaEmasPerak = 0;
        }

        $this->formattedHargaEmasPerak = number_format($this->hargaEmasPerak, 0, '', '.');

        $this->updated('hargaEmasPerak');
    }


    public function updated($propertyName)
    {

        $numericProperties = [
            'emasPerak',
            'hargaEmasPerak',
        ];

        if (in_array($propertyName, $numericProperties)) {
            $this->$propertyName = is_numeric($this->$propertyName) ? (float)$this->$propertyName : 0;
            $this->recalculateAll();
        }
    }

    
    public function render()
    {
        return view('livewire.zakat-peternakan');
    }
}
