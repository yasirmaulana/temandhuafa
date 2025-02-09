<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;

class SocialiteController extends Controller
{

    /**
     * Function : google login
     * Description : this function will redirect to google
     * @param NA
     * @return void
     */
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }


    public function googleAuthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            // dd($googleUser);
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect('panel/dashboard');
            } else { 
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('Password@1234'),
                    'google_id' => $googleUser->id,
                    'role_id' => 2
                ]);

                if ($userData) {
                    Auth::login($userData);
                    return redirect('panel/dashboard');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
