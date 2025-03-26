<?php

namespace App\Livewire;

use Auth;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Fundraiser;
use Livewire\Component;
use Livewire\WithFileUploads;

class DashboardFundraiser extends Component
{
    use WithFileUploads;

    // Properti form
    public $nama_lembaga, $jenis_badan_usaha, $nomor_ijin, $nomor_kemenkumham, $provinsi, $kota_domisili, $alamat_lembaga;
    public $list_kota = [];
    public $list_provinsi = [];
    public $nomor_rekening, $nama_rekening, $nama_bank;
    public $nama_pimpinan, $nomor_hp_pimpinan, $email_pimpinan;
    public $nama_bendahara, $nomor_hp_bendahara, $email_bendahara;
    public $nama_pj, $nomor_pj, $email_pj;
    public $cover, $file_legalitas, $file_kemenkumham, $file_rekening, $file_pernyataan, $file_struktur, $file_surat_tugas, $file_ktp;
    public $terms, $register_status, $user_id;
    public $selectedProvinsi;

    protected $messages = [
        'cover.image' => 'File yang diunggah harus berupa gambar.',
        'cover.mimes' => 'Format gambar harus jpg, jpeg, atau png.',
        'cover.max' => 'Ukuran gambar maksimal 2MB.',

        'nama_lembaga.required' => 'Nama Lembaga wajib diisi.',
        'nama_lembaga.max' => 'Nama Lembaga maksimal :max karakter.',

        'nomor_hp_pimpinan.required' => 'Kontak WA Pimpinan wajib diisi.',
        'nomor_hp_pimpinan.numeric' => 'Kontak WA Pimpinan harus berupa angka.',
        'nomor_hp_pimpinan.digits_between' => 'Kontak WA Pimpinan harus antara :min hingga :max digit.',
        // 'nomor_hp_pimpinan.unique' => 'Kontak WA Pimpinan sudah digunakan.',

        'email_pimpinan.required' => 'Email Pimpinan wajib diisi.',
        'email_pimpinan.email' => 'Format email pimpinan tidak valid.',
        // 'email_pimpinan.unique' => 'Email sudah terdaftar.',

        'terms.accepted' => 'Anda harus menyetujui syarat & ketentuan.'
    ];

    // Aturan validasi
    protected $rules = [
        'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'nama_lembaga' => 'required|string|max:255',
        'jenis_badan_usaha' => 'required|string|max:255',
        'nomor_ijin' => 'required|string|max:255',
        'nomor_kemenkumham' => 'required|string|max:255',
        'alamat_lembaga' => 'required|string|max:255',
        // 'provinsi' => 'required|string|max:255',
        // 'kota_domisili' => 'required|string|max:255',
        'nomor_rekening' => 'required|string|max:255',
        'nama_rekening' => 'required|string|max:255',
        'nama_bank' => 'required|string|max:255',
        'nama_pimpinan' => 'required|string|max:255',
        'nomor_hp_pimpinan' => 'required|string|max:255',
        'email_pimpinan' => 'required|email|max:255',
        'nama_bendahara' => 'required|string|max:255',
        'nomor_hp_bendahara' => 'required|string|max:255',
        'email_bendahara' => 'required|email|max:255',
        'nama_pj' => 'required|string|max:255',
        'nomor_pj' => 'required|string|max:255',
        'email_pj' => 'required|string|max:255',
        'file_legalitas' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_kemenkumham' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_rekening' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_pernyataan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_struktur' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_surat_tugas' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'terms' => 'accepted'
    ];

    public function auth_register()
    {
        $this->validate();

        // Simpan file yang diunggah
        $filePaths = [];
        $fileFields = [
            'cover',
            'file_legalitas',
            'file_kemenkumham',
            'file_rekening',
            'file_pernyataan',
            'file_struktur',
            'file_surat_tugas',
            'file_ktp'
        ];

        foreach ($fileFields as $file) {
            if (!empty($this->$file)) { // Cek jika file tidak null
                $filePaths[$file] = $this->$file->store('fundraisers', 'public');
            }
        }

        // Simpan data ke database dengan user_id dari Auth
        Fundraiser::create(array_merge($this->only([
            'nama_lembaga',
            'jenis_badan_usaha',
            'nomor_ijin',
            'nomor_kemenkumham',
            'provinsi',
            'kota_domisili',
            'alamat_lembaga',
            'nomor_rekening',
            'nama_rekening',
            'nama_bank',
            'nama_pimpinan',
            'nomor_hp_pimpinan',
            'email_pimpinan',
            'nama_bendahara',
            'nomor_hp_bendahara',
            'email_bendahara',
            'nama_pj',
            'nomor_pj',
            'email_pj',
            'cover',
            'file_legalitas',
            'file_kemenkumham',
            'file_rekening',
            'file_pernyataan',
            'file_struktur',
            'file_surat_tugas',
            'file_ktp',
        ]), $filePaths, [
            'register_status' => 'register',
            'user_id' => Auth::id()
        ]));

        return redirect('/akun/dashboard-donatur')->with('success', "Register fundraiser successfully");
    }

    public function updatedProvinsi($value)
    {
        $this->list_kota = Kota::getKotaByProvinsi($value);
        $this->dispatch('$refresh');
    }

    // public function mount() {
    // $this->kota_domisili = Kota::getKotaByProvinsi('Aceh');
    // }

    public function render()
    {
        $this->list_provinsi = Provinsi::orderBy('provinsi', 'asc')->get();

        return view('livewire.dashboard-fundraiser');
    }
}
