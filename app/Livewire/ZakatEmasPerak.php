<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatEmasPerak extends Component
{
    public $selectedLogam;
    public $formattedEmasPerak;
    public $emasPerak;
    public $formattedHargaEmasPerak;
    public $jumlahLebihNisab;
    public $zakatLebihNisab;
    public $hargaEmasPerak;
    public $wajibZakat;
    public $formattedJumlahBayar;
    public $jumlahBayar;

    public function updatedSelectedLogam()
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

    public function mount()
    {
        $this->recalculateAll();
        $this->wajibZakat = "";
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

    private function recalculateAll()
    {
        $this->determineWajibZakat();
        $this->calculateJumlahBayar();
    }

    private function determineWajibZakat() 
    {
        if ($this->selectedLogam == 'emas') {
            $this->wajibZakat = ($this->emasPerak >= 70) ? 'Ya' : 'Tidak';
        } else {
            $this->wajibZakat = ($this->emasPerak >= 500) ? 'Ya' : 'Tidak';
        }
    }

    private function calculateJumlahBayar()
    {
        if($this->wajibZakat == 'Ya') {
            if($this->selectedLogam == 'emas') {
                $this->jumlahLebihNisab = $this->emasPerak - 70;
                $this->zakatLebihNisab = ($this->jumlahLebihNisab/14);
                $this->jumlahBayar = (1.75 + (floor($this->zakatLebihNisab)*0.35)) * $this->hargaEmasPerak;
            } else {
                $this->jumlahLebihNisab = $this->emasPerak - 500;
                $this->zakatLebihNisab = ($this->jumlahLebihNisab/100);
                $this->jumlahBayar = (12.5 + (floor($this->zakatLebihNisab)*2.5)) * $this->hargaEmasPerak;
            }
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
        } else {
            $this->jumlahBayar = 0;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');    
        }
    }

    public function render()
    {
        return view('livewire.zakat-emas-perak');
    }
}
