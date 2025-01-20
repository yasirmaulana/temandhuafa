<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Payment extends Component
{

    public $snapToken;

    public function render()
    {
        return view('livewire.front.payment');
    }

    public function mount($snapToken)
    {
        $this->snapToken = $snapToken;
    }
}
