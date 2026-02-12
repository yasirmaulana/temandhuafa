<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Fundraiser;
use App\Models\Transaction;

use Livewire\WithFileUploads;

class DashboardDonatur extends Component
{
    use WithFileUploads;

    public $transactions, $fundraiser_status, $total_donasi;
    public $fundraiser = [];

    // Edit Profile Properties
    public $name, $email, $phone;
    public $password, $password_confirmation;
    public $photo; // For image upload
    public $isEditing = false;

    public function mount()
    {
        $user = Auth::user()->fresh();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->handphone;
    }

    public function editProfile()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->handphone;
        $this->isEditing = true;
    }

    public function cancelEdit()
    {
        $this->isEditing = false;
        $this->reset(['password', 'password_confirmation', 'photo']);
    }

    public function updateProfile()
    {
        $user = Auth::user();
        
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|numeric',
            'photo' => 'nullable|image|max:2048', // 2MB Max
        ];

        if (!empty($this->password)) {
            $rules['password'] = 'min:6|confirmed';
        }

        $this->validate($rules);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'handphone' => $this->phone,
        ];

        if (!empty($this->password)) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($this->password);
        }

        if ($this->photo) {
            $filename = time() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('donaturs', $filename, 'public');
            $data['avatar'] = $filename;
        }

        $user->update($data);

        $this->isEditing = false;
        $this->reset(['password', 'password_confirmation', 'photo']);
        session()->flash('message', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        $user = Auth::user();
        
        $this->fundraiser = Fundraiser::getFundraiserByUserid($user->id);
        if (empty($this->fundraiser) || count($this->fundraiser) === 0) {
            $this->fundraiser_status = 'not register';
        } else {
            $this->fundraiser_status = $this->fundraiser[0]['register_status'] ?? 'unknown';
        }

        $this->transactions = Transaction::getTransactionByEmailUser($user->email);
        $this->total_donasi = Transaction::getSettlementAmountByEmail($user->email);

        return view('livewire.dashboard-donatur', [
            'user' => $user
        ]);
    }
}
