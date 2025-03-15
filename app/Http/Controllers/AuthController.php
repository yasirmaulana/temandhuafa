<?php

namespace App\Http\Controllers;

use Auth;
use PostHog\PostHog;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        // if (!empty(Auth::check())) {
        //     return redirect('panel/dashboard'); 
        // }
        // return view('auth.login');
        if (Auth::check()) {
            $user = Auth::user();

            if ($user) {
                // Kirim event ke PostHog jika user terdeteksi
                PostHog::capture([
                    'distinctId' => $user->id,
                    'event' => 'User Logged In',
                    'properties' => [
                        'email' => $user->email,
                        'role' => $user->role ?? 'user',
                    ],
                ]);
            }

            return redirect('panel/dashboard'); 
        }

        return view('auth.login');
    }

    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('panel/dashboard');
        } else {
            return redirect()->back()->with('error', "Please enter current email and password");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
