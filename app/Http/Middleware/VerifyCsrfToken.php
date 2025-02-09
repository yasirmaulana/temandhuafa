<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/payment-notification',
    ];

    protected function inExceptArray($request) {
        // Simpan hasil pengecekan parent
        $isExcepted = parent::inExceptArray($request);
    
        // Jika URI ini dikecualikan, log informasi
        if ($isExcepted) {
            Log::info('CSRF Exception Matched: ' . $request->getUri());
        }
    
        return $isExcepted;
    }
}
