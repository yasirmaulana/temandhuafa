<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    public function list()
    {
        return view('panel.fundraiser.list');
    }
}
