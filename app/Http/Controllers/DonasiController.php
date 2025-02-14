<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Auth;


class DonasiController extends Controller
{
    
    public $email;
    public $roleId;
    public $data;

    public function __construct()
    {
        if(Auth::check()) {
            $this->email = Auth::user()->email;
            $this->roleId = Auth::user()->role_id;
        }
        
        $transactionModel = new Transaction(); 

        if($this->roleId == 1) {
            $this->data['getRecord'] = $transactionModel->getTransaction();
        } elseif($this->roleId == 2) {
            $this->data['getRecord'] = $transactionModel->getTransactionByEmail($this->email);
        }
        
        $this->data['getCampaign'] = Campaign::getCampaigns();
    }

    public function list()
    {
        // dd($this->data);
        return view('panel.donasi.list', $this->data);
    }
}
