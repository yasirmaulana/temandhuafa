<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

class MidtransService
{
    /**
     * Initialize Midtrans configuration.
     */
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');
    }

    /**
     * Handle Midtrans notification.
     *
     * @param Notification|array|null $notificationData
     * @return bool
     * @throws \Exception
     */
    public function handleNotification($notificationData = null)
    {
        try {
            if ($notificationData instanceof Notification) {
                $notification = $notificationData;
            } elseif (is_array($notificationData)) {
                // If array given, we could try to simulate or just use it.
                // But Midtrans\Notification is what we want.
                $notification = (object) $notificationData;
            } else {
                $notification = new Notification();
            }

            $transactionStatus = $notification->transaction_status;
            $paymentType = $notification->payment_type;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status ?? null;

            Log::info("Incoming Midtrans Webhook", [
                'order_id' => $orderId,
                'status' => $transactionStatus,
                'payment_type' => $paymentType
            ]);

            $transaction = Transaction::where('order_id', $orderId)->first();

            if (!$transaction) {
                Log::error("Transaction not found for order_id: $orderId");
                return false;
            }

            // Handle idempotency: if status is already settlement, we might want to skip.
            // But sometimes we get capture then settlement, so let's be careful.
            if (in_array($transaction->transaction_status, ['settlement', 'capture']) && 
                in_array($transactionStatus, ['pending', 'expire', 'deny', 'cancel'])) {
                Log::info("Ignoring late status update for finished transaction", ['order_id' => $orderId]);
                return true;
            }

            $oldStatus = $transaction->transaction_status;
            $newStatus = $this->mapStatus($transactionStatus, $paymentType, $fraudStatus);

            $transaction->transaction_status = $newStatus;
            $transaction->transaction_id = $notification->transaction_id;
            $transaction->payment_type = $paymentType;
            $transaction->fraud_status = $fraudStatus;
            
            // Save additional info if available
            if (isset($notification->pdf_url)) {
                $transaction->pdf_url = $notification->pdf_url;
            }

            $transaction->save();

            Log::info("Transaction status updated", [
                'order_id' => $orderId,
                'old_status' => $oldStatus,
                'new_status' => $newStatus
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Midtrans Service Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Map Midtrans status to local transaction status.
     *
     * @param string $status
     * @param string $type
     * @param string|null $fraud
     * @return string
     */
    private function mapStatus($status, $type, $fraud)
    {
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                return ($fraud == 'challenge') ? 'challenge' : 'settlement';
            }
            return 'settlement';
        }

        if ($status == 'settlement') {
            return 'settlement';
        }

        if ($status == 'pending') {
            return 'pending';
        }

        if ($status == 'deny' || $status == 'expire' || $status == 'cancel') {
            return $status;
        }

        return $status;
    }
}
