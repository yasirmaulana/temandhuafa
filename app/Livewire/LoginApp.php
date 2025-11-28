<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class LoginApp extends Component
{
    public $email;
    public $password;
    public $previousUrl;

    public function login()
    {        
        if (Auth::check()) {
            $user = Auth::user();
            return redirect('/akun/dashboard-donatur'); 
        }
        return view('livewire.login-app');
    }

    public function auth_login()
    {
        $this->previousUrl = session('intended_url');
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // return redirect('/akun/dashboard-donatur');
            return redirect($this->previousUrl);
        } else {
            return redirect()->back()->with('error', "Please enter current email and password");
        }
    }

}
