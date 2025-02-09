<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function handleCallback(Request $request)
    {
        try {
            // Ambil data dari request
            $data = $request->all();

            // Log data untuk debugging
            Log::info('Payment Callback Data:', $data);

            // Simpan data ke database
            $this->saveTransactionData($data);

            // Kirim respons ke frontend
            return response()->json([
                'status' => 'success',
                'message' => 'Callback received successfully.',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            Log::error('Error handling callback: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process callback.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function saveTransactionData($data)
    {
        // Gunakan updateOrCreate untuk memastikan data tidak duplikat
        Transaction::updateOrCreate(
            ['order_id' => $data['order_id']],
            [
                'transaction_id' => $data['transaction_id'] ?? null,
                'gross_amount' => $data['gross_amount'] ?? 0,
                'payment_type' => $data['payment_type'] ?? null,
                'transaction_time' => $data['transaction_time'] ?? now(),
                'transaction_status' => $data['transaction_status'] ?? 'pending',
                'fraud_status' => $data['fraud_status'] ?? null,
                'pdf_url' => $data['pdf_url'] ?? null,
            ]
        );
    }

    public function handleNotification(Request $request) 
    {
        try {
            // Ambil data dari Midtrans webhook
            $data = $request->all();

            // Log data untuk debugging
            Log::info('Payment Notification Data:', $data);

            // Verifikasi tanda tangan (signature) untuk keamanan
            $isValid = $this->verifySignature($data);

            if (!$isValid) {
                return response()->json(['status' => 'error', 'message' => 'Invalid signature.'], 400);
            }

            // Simpan data ke database
            $this->saveTransactionData($data);

            // Kirim respons ke Midtrans
            return response()->json(['status' => 'success', 'message' => 'Notification received successfully.']);
        } catch (\Exception $e) {
            Log::error('Error handling notification: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process notification.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function verifySignature($data)
    {
        $serverKey = config('midtrans.serverKey');
        $orderId = $data['order_id'];
        $statusCode = $data['status_code'];
        $grossAmount = $data['gross_amount'];
        $signatureKey = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        return $signatureKey === ($data['signature_key'] ?? '');
    }
}
