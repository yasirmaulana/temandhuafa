<?php

namespace App\Livewire;

// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class LoginApp extends Component
{
    public $email;
    public $password;
    public $previousUrl;

    public function render()
    {
        return view('livewire.login-app');
    }

    public function auth_login()
    {
        $this->previousUrl = session('intended_url');
        // dd($this->previousUrl);

        // 1. Validasi Input
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cek Rate limiter
        $throttleKey = strtolower($this->email) . '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('email', 'Terlalu banyak percobaan, Silakan coba lagi nanti.');
            return;
        }

        // 3. Percobaan Login
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate(); // Mencegah Session Fixation
            RateLimiter::clear($throttleKey);

            // Hapus session intended_url setelah berhasil login
            session()->forget('intended_url');

            // Redirect ke halaman yang dituju atau default ke dashboard
            return redirect()->intended($this->previousUrl ?? '/akun/dashboard-donatur');
        }

        // 4. Jika Gagal
        RateLimiter::hit($throttleKey);
        $this->addError('email', 'Email atau password salah.');
    }
}
