<?php

namespace App\Events;

use App\Models\Transaction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class DonationCreated
{
    use Dispatchable, SerializesModels;

    public function __construct(public Transaction $transaction) {}
}
