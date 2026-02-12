<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function list()
    {
        return view('panel.whatsapp.list');
    }
}
