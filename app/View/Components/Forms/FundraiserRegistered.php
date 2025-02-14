<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Auth;
use App\Models\Fundraiser;

class FundraiserRegistered extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    
        $data['getRecord'] = Fundraiser::getFundraiserByUserid(Auth::id());
    
        return view('components.forms.fundraiser-registered', $data);
    }
}
