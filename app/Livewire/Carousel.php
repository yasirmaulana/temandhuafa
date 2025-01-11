<?php

namespace App\Livewire;

use App\Models\Slider;
use Livewire\Component;

class Carousel extends Component
{

    public $sliderCarousel = [];

    public function render()
    {
        return view('livewire.carousel');
    }

    public function mount()
    {
        $this->sliderCarousel = Slider::getRecord();
    }
}
