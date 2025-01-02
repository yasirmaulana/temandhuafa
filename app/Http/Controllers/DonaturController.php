<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function list()
    {
        return view('panel.donatur.list');
    }
}
