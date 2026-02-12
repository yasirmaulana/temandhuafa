<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DonationReceiptController extends Controller
{
    public function download($order_id)
    {
        $transaction = Transaction::select('transactions.*', 'campaigns.title as campaign_title')
            ->leftJoin('campaigns', 'campaigns.id', '=', 'transactions.campaign_id')
            ->where('order_id', $order_id)
            ->firstOrFail();

        $pdf = Pdf::loadView('pdf.receipt', compact('transaction'));
        
        return $pdf->stream('kuitansi-'.$order_id.'.pdf');
    }
}
