<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fundraiser;
use App\Models\User;
use Auth;

class FundraiserDetail extends Component
{

    public $fundraiser, $user;

    public function mount($slug) {

        $this->fundraiser = Fundraiser::where('slug', $slug)->firstOrFail();
        $this->user = User::getSingle($this->fundraiser->user_id);    
    }

    public function render()
    {
        return view('livewire.fundraiser');
    }
}
