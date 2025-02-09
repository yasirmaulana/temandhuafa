<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DonasiController extends Controller
{

    public function list()
    {
        $data['getRecord'] = Transaction::getRecord();
        return view('panel.donasi.list', $data);
    }
}
