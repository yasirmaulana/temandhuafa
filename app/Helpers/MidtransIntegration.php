<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class MidtransIntegration
{
    public static function createCoreApiPayment($dataDonasi)
    {
        $serverKey      = config('midtrans.serverKey') ?: env('MIDTRANS_SERVER_KEY', '');
        $isProduction   = config('midtrans.isProduction') ?: env('MIDTRANS_IS_PRODUCTION', false);
        $webhookUrl     = config('app.url') . '/api/webhooks/midtrans';
        $baseUrl        = $isProduction
            ? 'https://api.midtrans.com/v2/charge'
            : 'https://api.sandbox.midtrans.com/v2/charge';

        // 1. Hitung fee
        $payMethod = $dataDonasi['payment_method'];

        if ($payMethod == 'gopay') {
            $fee = round($dataDonasi['amount'] * 0.0205); // Fee Gopay 2.05%
        } else {
            $fee = 4440; // Fee tetap Rp 4.000 + PPN 11%
        }

        // 2. Data umum transaksi
        $infakSistem = $dataDonasi['infak_sistem'];
        if ($infakSistem > 0) {
            $grossAmount = $dataDonasi['amount'] + $fee;
            $itemDetails     = [
                [
                    'id'       => 'a01',
                    'price'    => $dataDonasi['amount'],
                    'quantity' => 1,
                    'name'     => $dataDonasi['campaign_title'],
                ],
                [
                    'id'       => 'b02',
                    'price'    => $fee,
                    'quantity' => 1,
                    'name'     => 'Payment Fee',
                ],
            ];
        } else {
            $grossAmount = $dataDonasi['gross_amount'];
            $amount = $dataDonasi['amount'] - $fee;
            $itemDetails     = [
                [
                    'id'       => 'a01',
                    'price'    => $amount,
                    'quantity' => 1,
                    'name'     => $dataDonasi['campaign_title'],
                ],
                [
                    'id'       => 'b02',
                    'price'    => $fee,
                    'quantity' => 1,
                    'name'     => 'Payment Fee',
                ],
            ];
        }
        $orderId         = $dataDonasi['order_id'];

        $customerDetails = [
            'first_name' => $dataDonasi['donor_name'],
            'email'      => $dataDonasi['email'],
            'phone'      => $dataDonasi['phone']
        ];

        // 3. Bangun payload
        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => $customerDetails,
            'item_details'     => $itemDetails,
        ];

        // 4. Konfigurasi payment type
        $paymentTypes = [
            'gopay' => [
                'payment_type' => 'qris',
                'qris' => [
                    'acquirer' => 'gopay'
                ],
            ],
            'channel' => [
                'payment_type' => 'echannel',
                'echannel'     => [
                    "bill_info1" => "Payment:",
                    "bill_info2" => "Online purchase"
                ],
            ],
            'bni-va' => [
                'payment_type'   => 'bank_transfer',
                'bank_transfer'  => ['bank' => 'bni'],
            ],
            'bri-va' => [
                'payment_type'   => 'bank_transfer',
                'bank_transfer'  => ['bank' => 'bri'],
            ],
            'permata-va' => [
                'payment_type'   => 'bank_transfer',
                'bank_transfer'  => ['bank' => 'permata'],
            ],
        ];

        if (isset($paymentTypes[$payMethod])) {
            $params = array_merge($params, $paymentTypes[$payMethod]);
        }
        Log::info('$params', $params);


        // 5. Headers termasuk override webhook
        $headers = [
            'Content-Type'          => 'application/json',
            'Accept'                => 'application/json',
            'Authorization'         => 'Basic ' . base64_encode($serverKey . ':'),
            'X-Append-Notification' => $webhookUrl,
        ];

        // Log::info('headers', $headers);

        // 6. Eksekusi request
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $baseUrl, [
                'body' => json_encode($params),
                'headers' => $headers,
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            Log::info('Midtrans Response:', $result);
            return $result;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('Midtrans Request Error: ' . $e->getMessage(), [
                'request' => $params
            ]);
            return [
                'status'  => 'error',
                'message' => 'Gagal terhubung ke Midtrans',
            ];
        } catch (\Exception $e) {
            Log::error('Midtrans General Error: ' . $e->getMessage());
            return [
                'status'  => 'error',
                'message' => 'Terjadi kesalahan sistem',
            ];
        }
    }
}
