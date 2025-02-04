<?php

namespace App\Livewire;

use Livewire\Component;

class Fidyah extends Component
{
    public $jumlahHariTidakPuasa;
    public $formattedBiayaMakan;
    public $biayaMakan;

    public $formattedJumlahBayar;
    public $jumlahBayar;

    public function updatedFormattedBiayaMakan($value)
    {
        $this->biayaMakan = (int) str_replace('.', '', $value);
        $this->formattedBiayaMakan = number_format((int) $this->biayaMakan, 0, '', '.');
        $this->updated('biayaMakan');
    }

    public function mount()
    {
        $this->recalculateAll();
    }

    public function updated($propertyName)
    {

        $numericProperties = [
            'jumlahHariTidakPuasa',
            'biayaMakan',
        ];

        if (in_array($propertyName, $numericProperties)) {
            $this->$propertyName = is_numeric($this->$propertyName) ? (float)$this->$propertyName : 0;
            $this->recalculateAll();
        }
    }

    private function recalculateAll()
    {
        $this->calculateJumlahBayar();
    }

    private function calculateJumlahBayar()
    {
            $this->jumlahBayar = $this->jumlahHariTidakPuasa * $this->biayaMakan;
            $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
    }

    public function render()
    {
        return view('livewire.fidyah');
    }
}
