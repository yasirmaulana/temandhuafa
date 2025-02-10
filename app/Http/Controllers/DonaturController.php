<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function list()
    {
        $data['getRecord'] = []; 
        return view('panel.donatur.list', $data);
    }
}
