<?php

namespace App\Livewire;

use Livewire\Component;

class Kafarat extends Component
{
    public $selectedKafarat;
    public $denda;
    public $formattedJumlahMelanggarKafarat;
    public $jumlahMelanggarKafarat;
    public $formattedBiayaMakan;
    public $biayaMakan;
    public $formattedJumlahBayar;
    public $jumlahBayar;

    public function updatedSelectedKafarat($value)
    {
        if ($value == "sumpahPalsu" || $this->selectedKafarat == "ila") {
            $this->denda = "1 kali melanggar dendanya memberi makan 10 fakir miskin masing-masing 1 mud";
        } else {
            $this->denda = "Memerdekakan budak atau berpuasa dua bulan berturut-turut atau memberi makan 60 orang fakir miskin masing-masing 1 mud ";
        }
    }

    public function updatedFormattedJumlahMelanggarKafarat($value)
    {
        $this->jumlahMelanggarKafarat = (int) str_replace('.', '', $value);
        $this->formattedJumlahMelanggarKafarat = number_format((int) $this->jumlahMelanggarKafarat, 0, '', '.');
        $this->updated('jumlahMelanggarKafarat');
    }

    public function updatedFormattedBiayaMakan($value)
    {
        $this->biayaMakan = (int) str_replace('.', '', $value);
        $this->formattedBiayaMakan = number_format((int) $this->biayaMakan, 0, '', '.');
        $this->updated('biayaMakan');
    }

    public function mount()
    {
        $this->denda = "1 kali melanggar dendanya memberi makan 10 fakir miskin masing-masing 1 mud";
        $this->selectedKafarat = "sumpahPalsu";
        $this->calculateJumlahBayar();
    }

    public function updated($propertyName)
    {

        $numericProperties = [
            'jumlahMelanggarKafarat',
            'biayaMakan',
        ];

        if (in_array($propertyName, $numericProperties)) {
            $this->$propertyName = is_numeric($this->$propertyName) ? (float)$this->$propertyName : 0;
            $this->calculateJumlahBayar();
        }
    }

    private function calculateJumlahBayar()
    {
        if (in_array($this->selectedKafarat, ["sumpahPalsu", "ila"])) {
            $this->jumlahBayar = $this->jumlahMelanggarKafarat * $this->biayaMakan * 10; 
        } else {
            $this->jumlahBayar = $this->jumlahMelanggarKafarat * $this->biayaMakan * 60;
        }
        $this->formattedJumlahBayar = number_format((int) $this->jumlahBayar, 0, '', '.');
    }

    public function render()
    {
        return view('livewire.kafarat');
    }
}
