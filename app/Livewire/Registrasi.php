<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Registrasi extends Component
{

    use WithFileUploads;
    
    public $avatar, $name, $email, $handphone, $password, $role_id, $userUid, $password_confirmation, $terms;

    protected $messages = [
        'avatar.image' => 'File yang diunggah harus berupa gambar.',
        'avatar.mimes' => 'Format gambar harus jpg, jpeg, atau png.',
        'avatar.max' => 'Ukuran gambar maksimal 2MB.',
        
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal :max karakter.',
    
        'handphone.required' => 'Nomor WA wajib diisi.',
        'handphone.numeric' => 'Nomor WA harus berupa angka.',
        'handphone.digits_between' => 'Nomor WA harus antara :min hingga :max digit.',
        'handphone.unique' => 'Nomor WA sudah digunakan.',
    
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
    
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal :min karakter.',
        'password.confirmed' => 'Password konfirmasi tidak cocok.',
        'password_confirmation.required' => 'Konfirmasi password wajib diisi.',

        'terms.accepted' => 'Anda harus menyetujui syarat & ketentuan.'
    ];
    
    protected $rules = [
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'name' => 'required|string|max:21',
        'handphone' => 'required|numeric|digits_between:10,15|unique:users,handphone',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
        'terms' => 'accepted'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function auth_register()
    {
        $validatedData = $this->validate();
        
        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
        }

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'handphone' => $validatedData['handphone'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 2,
            'avatar' => $avatarPath ?? null, 
            'user_uid' => Str::uuid()
        ]);
        return redirect('/loginapp')->with('success', "Register successfully");
    }
    
    public function render()
    {
        return view('livewire.registrasi');
    }

}
