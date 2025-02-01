<?php

namespace App\Livewire;

use Livewire\Component;

class Zakat extends Component
{
    public $selectedZakat;

    // Akan dipanggil setiap kali `selectedZakat` berubah
    public function updatedSelectedZakat()
    {
        // Force Livewire untuk mereset ulang tampilan
        $this->dispatch('$refresh');
    }
    
    public function render()
    {
        return view('livewire.zakat');
    }
}
