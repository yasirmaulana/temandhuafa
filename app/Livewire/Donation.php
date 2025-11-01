<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Campaign;

class Donation extends Component
{
    public $campaign;
    public $campaignId;
    public $fundraiserId;
    public $amount;
    public $formattedAmount;
    public $infaqSistem = true;
    public $namaLengkap;
    public $email;
    public $phone;
    public $anonim = false;
    public $doa;
    public $infaqSistemAmount; 
    public $totalAmount;
    public $isZiswaf;
    public $titleBayar;
    public $titleRowBayar;
    public $orderId;
    public $slug;
    public $addError;
    public $transaksi = [];

    public function mount($slug)
    {
        $this->slug = $slug;
        $parts = explode('-', $slug);
        $this->titleRowBayar = $parts[0];
        $this->infaqSistemAmount = 5000;
        if (!in_array($this->titleRowBayar, ["infaq", "emas", "perak", "pertanian", "peternakan", "fidyah", "kafarat"])) {
            $this->campaign = Campaign::getCampaignBySlug($slug);
            $this->campaignId = $this->campaign->id;
            $this->totalAmount = $this->infaqSistemAmount;
            $this->orderId = $this->campaignId . '-' . rand();
            $this->fundraiserId = $this->campaign->fundraiser_id;
        } elseif ($this->titleRowBayar == "infaq") {
            $this->isZiswaf = false;
            $this->orderId = $this->titleRowBayar . '-' . rand();
        } else {
            $this->isZiswaf = true;
            $this->orderId = $this->titleRowBayar . '-' . rand();
        }
        $mapTitle = [
            "infaq" => "Infak",
            "emas" => "Zakat Emas",
            "perak" => "Zakat Perak",
            "pertanian" => "Zakat Pertanian",
            "peternakan" => "Zakat Peternakan",
            "maal" => "Zakat Maal",
            "perniagaan" => "Zakat Perniagaan",
            "penghasilan" => "Zakat Penghasilan",
            "fidyah" => "Fidyah",
            "kafarat" => "Kafarat",
        ];

        $this->titleBayar = $mapTitle[$this->titleRowBayar] ?? "Campaign";
        $this->amount = (int) $parts[1];
        // $this->formattedAmount = number_format((int) $this->amount, 0, '', '.');

        $this->totalAmount = $this->amount + $this->infaqSistemAmount;

        if (!empty(Auth::check())) {
            $this->namaLengkap = Auth::user()->name;
            $this->email = Auth::user()->email;
            $this->phone = Auth::user()->handphone;
        }
    }

    public function loginForm($currentUrl) {
        // dd($currentUrl);
        session([
            'intended_url' => $currentUrl,
        ]);
    }

    public function createTransaction() {
        session([
            'donasi' => [
                'order_id' => $this->orderId,
                'campaign_id' => $this->campaignId ?? null,
                'fundraiser_id' => $this->fundraiserId ?? null,
                'infaq_sistem' => $this->infaqSistem,
                'donor_name' => $this->namaLengkap,
                'email' => $this->email,
                'phone' => $this->phone,
                'anonim' => $this->anonim,
                'pray' => $this->doa,
                'gross_amount' => $this->amount,
                'amount' => $this->amount,
                'campaign_title' => $this->campaign->title ?? null,
            ]
        ]);

        return redirect()->route('payment.method');
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        $this->formattedAmount = number_format((int) $this->amount, 0, '', '.');
        $this->totalAmount = $this->infaqSistemAmount + $this->amount;
    }

    public function updatedFormattedAmount($value)
    {
        $this->amount = (int) str_replace('.', '', $value);
        $this->formattedAmount = number_format((int) $this->amount, 0, '', '.');
        $this->totalAmount = $this->infaqSistemAmount + $this->amount;
    }

    public function togle()
    {
        if ($this->infaqSistem) {
            $this->infaqSistemAmount = 5000;
        } else {
            $this->infaqSistemAmount = 0;
        }
        $this->totalAmount = $this->amount + $this->infaqSistemAmount;
    }

    public function updatedAmount($value)
    {
        $this->totalAmount = $this->infaqSistemAmount + (int)$value;
    }

    public function render()
    {
        return view('livewire.donation'); 
    }
}
