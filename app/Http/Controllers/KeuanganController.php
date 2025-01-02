<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function list()
    {
        return view('panel.keuangan.list');
    }
}
