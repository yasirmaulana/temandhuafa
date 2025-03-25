<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kota;
use App\Models\Provinsi;
use Livewire\WithFileUploads;

class DashboardFundraiser extends Component
{
    use WithFileUploads;

    // Properti form
    public $cover, $provinsi;
    public $nama_lembaga, $jenis_badan_usaha, $nomor_ijin, $nomor_kemenkumham;
    public $kota_domisili = [];
    // , $alamat_lembaga, $email_lembaga;
    public $nomor_telpon, $nomor_npwp;
    public $nama_bank, $nomor_rekening, $nama_rekening;
    public $nama_pj, $tempat_lahir, $tanggal_lahir, $email_pj, $nomor_pj, $jabatan;
    public $nama_pimpinan, $nomor_hp_pimpinan, $nama_bendahara, $nomor_hp_bendahara;
    public $register_status, $user_id;

    public $selectedProvinsi;

    // Properti untuk unggahan file
    public $image_ijin, $image_kemenkumham, $image_npwp, $image_buku_tabungan;
    public $image_doc_pj, $image_struktur_org, $image_ktp;

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

    // Aturan validasi
    protected $rules = [
        'nama_lembaga' => 'required|string|max:255',
        'email_lembaga' => 'required|email|max:255',
        'nomor_telpon' => 'required|numeric',
        'image_ijin' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_kemenkumham' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_npwp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_buku_tabungan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_doc_pj' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_struktur_org' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function auth_register()
    {
        $this->validate();

        // Simpan file yang diunggah
        $filePaths = [];
        foreach (['image_ijin', 'image_kemenkumham', 'image_npwp', 'image_buku_tabungan', 'image_doc_pj', 'image_struktur_org', 'image_ktp'] as $file) {
            if ($this->$file) {
                $filePaths[$file] = $this->$file->store('fundraisers', 'public');
            }
        }

        // Simpan data ke database (contoh menggunakan model Fundraiser)
        Fundraiser::create(array_merge($this->only([
            'nama_lembaga', 'jenis_badan_usaha', 'kota_domisili', 'alamat_lembaga',
            'email_lembaga', 'nomor_telpon', 'nomor_ijin', 'nomor_kemenkumham', 'nomor_npwp',
            'nama_bank', 'nomor_rekening', 'nama_rekening', 'nama_pj', 'tempat_lahir',
            'tanggal_lahir', 'email_pj', 'nomor_pj', 'jabatan', 'nama_pimpinan',
            'nomor_hp_pimpinan', 'nama_bendahara', 'nomor_hp_bendahara',
            'register_status', 'user_id'
        ]), $filePaths));

        session()->flash('message', 'Data fundraiser berhasil disimpan!');
    }

    public function updatedSelectedProvinsi($value) {
        $this->kota_domisili = Kota::getKotaByProvinsi($value);
        $this->dispatch('$refresh');
    }

    public function mount() {
        // $this->kota_domisili = Kota::getKotaByProvinsi('Aceh');
    }

    public function render()
    {
        $this->provinsi = Provinsi::orderBy('provinsi', 'asc')->get();

        return view('livewire.dashboard-fundraiser');
    }
}
