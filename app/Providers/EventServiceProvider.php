<?php 

namespace App\Providers;

use App\Events\DonationCreated;
use App\Listeners\SendDonationWhatsapp;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        DonationCreated::class => [
            SendDonationWhatsapp::class,
        ],
    ];
}