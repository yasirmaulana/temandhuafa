<?php

namespace App\Http\Controllers;

use App\Models\Fundraiser;
use Illuminate\Http\Request;
use Auth;

class FundraiserController extends Controller
{
    public function store(Request $request)
    {
        //     'imageIjin' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     'imageKemenhumham' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     'imageNpwp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     'imageBukuTabungan' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     'imageDocPj' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     'imageStrukturOrg' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     'imageKtp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',

        $data['nama_lembaga'] = $request->input('namaLembaga');
        $data['jenis_badan_usaha'] = $request->input('jenisBdanUsaha');
        $data['kota_domisili'] = $request->input('kotaDomisili');
        $data['alamat_lembaga'] = $request->input('alamatLembaga');
        $data['email_lembaga'] = $request->input('emailLembaga');
        $data['nomor_telpon'] = $request->input('nomorTelpon');
        $data['nomor_ijin'] = $request->input('nomorIjin');
        $data['nomor_kemenkumham'] = $request->input('nomorKemenkumham');
        $data['nomor_npwp'] = $request->input('nomorNpwp') ?? null;
        $data['nama_bank'] = $request->input('namaBank');
        $data['nomor_rekening'] = $request->input('nomorRekening');
        $data['nama_rekening'] = $request->input('namaRekening');
        $data['nama_pj'] = $request->input('namaPj');
        $data['tempat_lahir'] = $request->input('tempatLahir');
        $data['tanggal_lahir'] = $request->input('tanggallahir');
        $data['email_pj'] = $request->input('emailPj');
        $data['nomor_pj'] = $request->input('nomorPj');
        $data['jabatan'] = $request->input('jabatan');
        $data['nama_pimpinan'] = $request->input('namaPimpinan');
        $data['nomor_hp_pimpinan'] = $request->input('nomorHpPimpinan');
        $data['nama_bendahara'] = $request->input('namaBendahara');
        $data['nomor_hp_bendahara'] = $request->input('nomorHpBendahara');
        $data['user_id'] = Auth::user()->id;
        $data['register_status'] = 'register';

        // Handle file uploads
        if ($request->hasFile('imageIjin')) {
            $file = $request->file('imageIjin');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_ijin'] = $fileName;
        }
        if ($request->hasFile('imageKemenhumham')) {
            $file = $request->file('imageKemenhumham');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_kemenkumham'] = $fileName;
        }
        if ($request->hasFile('imageNpwp')) {
            $file = $request->file('imageNpwp');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_npwp'] = $fileName;
        }
        if ($request->hasFile('imageBukuTabungan')) {
            $file = $request->file('imageBukuTabungan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_buku_tabungan'] = $fileName;
        }
        if ($request->hasFile('imageDocPj')) {
            $file = $request->file('imageDocPj');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_doc_pj'] = $fileName;
        }
        if ($request->hasFile('imageStrukturOrg')) {
            $file = $request->file('imageStrukturOrg');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_struktur_org'] = $fileName;
        }
        if ($request->hasFile('imageKtp')) {
            $file = $request->file('imageKtp');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/fundraiser', $fileName);
            $data['image_ktp'] = $fileName;
        }

        Fundraiser::create($data);

        return redirect('panel/fundraiser')->with('success', 'Register success!');
    }

    public function list()
    {
        if (Auth::user()->role_id == 1) {
            $data['getRecord'] = Fundraiser::get();
            return view('panel.fundraiser.list', $data);
        } else {
            $data['getRecord'] = Fundraiser::getFundraiserByUserid(Auth::id());
            return view('panel.fundraiser.tabs', $data);
        }
    }
}
