<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class FonnteClient
{
    public function send(string $phone, string $message, array $extra = []): array
    {
        $payload = array_merge([
            'target'  => $this->formatPhone($phone),
            'message' => $message,
            'countryCode' => '62',
        ], $extra);

        $response = Http::withHeaders([
            'Authorization' => config('fonnte.token'),
        ])->post(config('fonnte.base_url').'/send', $payload);

        if ($response->failed()) {
            Log::warning('Fonnte send failed', [
                'payload' => $payload,
                'body'    => $response->json(),
            ]);
        }

        return $response->json();
    }

    private function formatPhone(string $phone): string
    {
        $number = preg_replace('/\D+/', '', $phone);
        return preg_replace('/^(0)/', '', $number);
    }
}