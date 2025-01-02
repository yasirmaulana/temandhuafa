<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function list()
    {
        return view('panel.campaign.list');
    }
}
