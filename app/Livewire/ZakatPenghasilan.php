<?php

namespace App\Livewire;

use Livewire\Component;

class ZakatPenghasilan extends Component
{
    public $campaign;
    public $formattedPenghasilan;
    public $penghasilan;
    public $formattedPenghasilanLain;
    public $penghasilanLain;
    public $formattedHutangJatuhTempo;
    public $hutangJatuhTempo;
    public $formattedPenghasilanPerBulan;
    public $penghasilanPerBulan;
    public $formattedHargaEmas;
    public $hargaEmas;
    public $formattedNisabPerBulan;
    public $nisabPerBulan;
    public $formattedJumlahZakatPenghasilan;
    public $jumlahZakatPenghasilan;
    public $wajibZakat = "";
    public $persen = 2.5;

    public function updatedFormattedPenghasilan($value)
    {
        $this->penghasilan = (int) str_replace('.', '', $value);
        $this->formattedPenghasilan = number_format((int) $this->penghasilan, 0, '', '.');
        $this->updated('penghasilan');
    }

    public function updatedFormattedPenghasilanLain($value)
    {
        $this->penghasilanLain = (int) str_replace('.', '', $value);
        $this->formattedPenghasilanLain = number_format((int) $this->penghasilanLain, 0, '', '.');
        $this->updated('penghasilanLain');
    }

    public function updatedFormattedHutangJatuhTempo($value)
    {
        $this->hutangJatuhTempo = (int) str_replace('.', '', $value);
        $this->formattedHutangJatuhTempo = number_format((int) $this->hutangJatuhTempo, 0, '', '.');
        $this->updated('hutangJatuhTempo');
    }

    public function updatedFormattedHargaEmas($value)
    {
        $this->hargaEmas = (int) str_replace('.', '', $value);
        $this->formattedHargaEmas = number_format((int) $this->hargaEmas, 0, '', '.');
        $this->updated('hargaEmas');
    }

    public function mount()
    {
        $this->recalculateAll();
    }

    public function updated($propertyName)
    {

        $numericProperties = [
            'penghasilan',
            'penghasilanLain',
            'hutangJatuhTempo',
            'penghasilanPerBulan',
            'hargaEmas',
            'nisabPerBulan',
            'jumlahZakatPenghasilan',
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
        $this->calculateTotalPenghasilan();
        $this->calculateNisab();
        $this->determineWajibZakat();
        $this->calculateJumlahBayar();
    }

    private function calculateTotalPenghasilan()
    {
        $this->penghasilanPerBulan =
            ($this->penghasilan ?? 0) +
            ($this->penghasilanLain ?? 0) -
            ($this->hutangJatuhTempo ?? 0);

        $this->formattedPenghasilanPerBulan = number_format((int) $this->penghasilanPerBulan, 0, '', '.');
    }

    private function calculateNisab()
    {
        $this->nisabPerBulan = ($this->hargaEmas * 85) / 12;
        $this->formattedNisabPerBulan = number_format((int) $this->nisabPerBulan, 0, '', '.');
    }

    private function determineWajibZakat()
    {
        if ($this->hargaEmas >= 900000) {
            $this->wajibZakat = $this->penghasilanPerBulan >= $this->nisabPerBulan ? "Ya" : "Tidak";
        }
    }

    private function calculateJumlahBayar()
    {
        if ($this->wajibZakat === "Ya") {
            $this->jumlahZakatPenghasilan = ceil($this->penghasilanPerBulan * ($this->persen / 100));
            $this->formattedJumlahZakatPenghasilan = number_format((int) $this->jumlahZakatPenghasilan, 0, '', '.');
        } else {
            $this->jumlahZakatPenghasilan = 0;
        }
    }

    public function render()
    {
        return view('livewire.zakat-penghasilan');
    }
}
