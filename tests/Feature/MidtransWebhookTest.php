<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Services\MidtransService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class MidtransWebhookTest extends TestCase
{
    use RefreshDatabase;

    public function test_webhook_successfully_updates_transaction_status()
    {
        // Mock transaction
        $transaction = Transaction::create([
            'order_id' => 'TRX-12345',
            'amount' => 10000,
            'gross_amount' => 10000,
            'transaction_status' => 'pending',
            'donor_name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        Config::set('midtrans.serverKey', 'SB-Mid-server-TEST');

        // Prepare simulated notification data
        $payload = [
            'transaction_status' => 'settlement',
            'payment_type' => 'bank_transfer',
            'order_id' => 'TRX-12345',
            'transaction_id' => 'midtrans-trx-id-123',
            'fraud_status' => 'accept',
            'gross_amount' => '10000.00'
        ];

        $service = new MidtransService();
        $service->handleNotification($payload);

        $transaction->refresh();
        $this->assertEquals('settlement', $transaction->transaction_status);
        $this->assertEquals('bank_transfer', $transaction->payment_type);
        $this->assertEquals('midtrans-trx-id-123', $transaction->transaction_id);
    }

    public function test_webhook_handles_transaction_not_found()
    {
        Log::shouldReceive('info');
        Log::shouldReceive('error')->once()->withArgs(function($msg) {
            return str_contains($msg, 'Transaction not found');
        });

        $payload = [
            'transaction_status' => 'settlement',
            'payment_type' => 'bank_transfer',
            'order_id' => 'NON-EXISTENT',
            'transaction_id' => 'midtrans-trx-id-123'
        ];

        $service = new MidtransService();
        $result = $service->handleNotification($payload);

        $this->assertFalse($result);
    }
}
