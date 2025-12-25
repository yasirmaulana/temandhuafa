<?php

namespace App\Http\Controllers;

use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;

class PaymentController extends Controller
{
    protected $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    /**
     * Handle payment notification from Midtrans (Webhook).
     */
    public function handleNotification(Request $request)
    {
        try {
            $processed = $this->midtransService->handleNotification();

            if (!$processed) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Transaction not found or invalid'
                ], 404);
            }

            return response()->json([
                'status' => 'success', 
                'message' => 'Notification handled successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Webhook Error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Server error while processing notification'
            ], 500);
        }
    }

    /**
     * Handle payment callback (Redirect from Midtrans).
     * This is usually just for showing status to the user.
     */
    public function handleCallback(Request $request)
    {
        // For callback, we usually just show a thank you page or status page.
        // We can still log it for debugging.
        Log::info('Payment Callback Redirect:', $request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Callback received.',
            'data' => $request->all()
        ]);
    }
}
