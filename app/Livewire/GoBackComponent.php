<?php

namespace App\Livewire;

use Livewire\Component;

class GoBackComponent extends Component
{
    public function goBack()
    {
        // Mengirim event ke browser untuk menjalankan JavaScript
        $this->dispatch('go-back');
    }

    public function render()
    {
        return view('livewire.go-back-component');
    }
}
