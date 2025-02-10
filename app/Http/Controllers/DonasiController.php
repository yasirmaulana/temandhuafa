<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Auth;


class DonasiController extends Controller
{
    
    public $email;
    public $roleId;

    public function __construct()
    {
        if(Auth::check()) {
            $this->email = Auth::user()->email;
            $this->roleId = Auth::user()->role_id;
        }
        
    }

    public function list()
    {
        $transactionModel = new Transaction();

        if($this->roleId == 1) {
            $data['getRecord'] = $transactionModel->getRecord();
        } elseif($this->roleId == 2) {
            $data['getRecord'] = $transactionModel->getTransactionByEmail($this->email);
        }
        
        return view('panel.donasi.list', $data);
    }
}
