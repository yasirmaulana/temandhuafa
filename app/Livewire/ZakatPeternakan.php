<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatPeternakan extends Component
{
    public $selectedTernak;
    public $formattedJumlahTernak;
    public $jumlahTernak;
    public $wajibZakat;
    public $formattedHargaTernak;
    public $hargaTernak;
    public $formattedJumlahBayar;
    public $jumlahBayar;
    public $jumlahLebihNisab;
    public $zakatLebihNisab;

    public function mount()
    {
        $this->recalculateAll();
        $this->wajibZakat = "";
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
            if($this->selectedTernak == 'sapi') {
                $zakatNisab = 0;
                if($this->jumlahTernak < 40) {
                    $zakatNisab = 1;
                } else {
                    $this->jumlahLebihNisab = $this->jumlahTernak - 40;
                    $this->zakatLebihNisab = ($this->jumlahLebihNisab/40);
                    $zakatNisab = 1 + (floor($this->zakatLebihNisab)*1);
                }
                $this->jumlahBayar = (1 + (floor($this->zakatLebihNisab)*1)) * $this->hargaTernak;
            } else {
                $zakatNisab = 0;
                if($this->jumlahTernak <= 120) {
                    $zakatNisab = 1;
                } elseif($this->jumlahTernak > 120 && $this->jumlahTernak <= 200) {
                    $zakatNisab = 2;
                } elseif($this->jumlahTernak > 200 && $this->jumlahTernak <= 300) {
                    $zakatNisab = 3;
                } elseif($this->jumlahTernak > 300 && $this->jumlahTernak <= 400) {
                    $zakatNisab = 4;
                } elseif($this->jumlahTernak > 400) {
                    $this->jumlahLebihNisab = $this->jumlahTernak - 400;
                    $this->zakatLebihNisab = ($this->jumlahLebihNisab/100);
                    $zakatNisab = 4 + (floor($this->zakatLebihNisab)*1);
                }
                $this->jumlahBayar = $zakatNisab * $this->hargaTernak;
            }
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


    public function updatedFormattedHargaTernak($value)
    {
        $this->hargaTernak = (int) str_replace('.', '', $value);
        $this->formattedHargaTernak = number_format((int) $this->hargaTernak, 0, '', '.');
        $this->updated('hargaTernak');
    }

    public function updatedSelectedTernak()
    {
        $this->dispatch('$refresh');
    }

    public function updated($propertyName)
    {

        $numericProperties = [
            'jumlahTernak',
            'hargaTernak',
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
