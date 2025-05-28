<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class LoginApp extends Component
{
    public $email;
    public $password;

    public function login()
    {        
        if (Auth::check()) {
            $user = Auth::user();

            // if ($user) {
            //     PostHog::capture([
            //         'distinctId' => $user->id,
            //         'event' => 'User Logged In',
            //         'properties' => [
            //             'email' => $user->email,
            //             'role' => $user->role ?? 'user',
            //         ],
            //     ]);
            // }

            return redirect('/akun/dashboard-donatur'); 
        }

        return view('livewire.login-app');
    }

    public function auth_login()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect('/akun/dashboard-donatur');
        } else {
            return redirect()->back()->with('error', "Please enter current email and password");
        }
    }

}
