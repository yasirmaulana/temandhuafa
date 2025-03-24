<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

            // Cari pengguna berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if ($user) {
                // Jika pengguna ditemukan, login
                Auth::login($user);
                return redirect('/akun/dashboard-donatur');
            } else {
                // Jika pengguna tidak ditemukan, buat pengguna baru
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('Password@1234'),
                    'google_id' => $googleUser->id,
                    'role_id' => 2,
                    'handphone' => '', // Nilai default
                    'user_uid' => Str::uuid()
                ]);

                if ($userData) {
                    Auth::login($userData);
                    return redirect('/akun/dashboard-donatur');
                }
            }
        } catch (Exception $e) {
            // Tangkap dan tampilkan error
            dd($e);
        }
    }
}
