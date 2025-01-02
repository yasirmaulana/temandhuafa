<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function list()
    {
        return view('panel.donasi.list');
    }
}
