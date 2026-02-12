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
        return view('panel.donasi.list', $this->data);
    }

    public function settlement($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->transaction_status = 'settlement';
            $transaction->save();
            return redirect()->back()->with('success', 'Status transaksi berhasil diubah menjadi settlement.');
        }

        return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
    }
}
