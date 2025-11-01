<?php 

namespace App\Listeners;

use App\Models\Transaction;
use App\Helpers\FonnteClient;
use App\Events\DonationCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDonationWhatsapp implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    public function handle(DonationCreated $event): void
    {
        $trx = $event->transaction;
        if (!$trx->phone) {
            return;
        }

        $message = $this->buildMessage($trx);

        $result = app(FonnteClient::class)->send($trx->phone, $message);

        // Opsional: simpan status pengiriman atau trigger alert bila gagal.
    }

    private function buildMessage(Transaction $trx): string
    {
        return sprintf(
            "Assalamu'alaikum %s,\n\nTerima kasih atas donasi Rp%s untuk %s.\nOrder ID: %s\nStatus akan kami info lagi setelah pembayaran terkonfirmasi.\n\n temandhuafa.id",
            $trx->donor_name ?? 'Teman Dhuafa',
            number_format($trx->gross_amount, 0, ',', '.'),
            $trx->campaign->title ?? 'program kami',
            $trx->order_id
        );
    }
}
