<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Auth;

class Checkout extends Component
{
    public $campaign;
    public $campaignId;
    public $fundraiserId;
    public $amount;
    public $formattedAmount;
    public $infaqSistem = true;
    public $namaLengkap = '';
    public $email = '';
    public $phone = '';
    public $anonim = false;
    public $doa = '';
    public $infaqSistemAmount;
    public $totalAmount;
    public $snapToken = '';
    public $isZiswaf;
    public $titleBayar;
    public $titleRowBayar;
    public $orderId;
    public $password = '';
    public $slug;
    public $addError;

    public function mount($slug)
    {
        $this->slug = $slug;
        $parts = explode('-', $slug);
        $this->titleRowBayar = $parts[0];
        $this->infaqSistemAmount = 2000;
        if (!in_array($this->titleRowBayar, ["infaq", "emas", "perak", "pertanian", "peternakan", "fidyah", "kafarat"])) {
            $this->campaign = Campaign::getCampaignBySlug($slug);
            $this->campaignId = $this->campaign->id;
            $this->totalAmount = $this->infaqSistemAmount;
            $this->orderId = $this->campaignId . '-' . rand();
            $this->fundraiserId = $this->campaign->fundraiserId;
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
            // return redirect('panel/dashboard');
            $this->namaLengkap = Auth::user()->name;
            $this->email = Auth::user()->email;
            $this->phone = Auth::user()->handphone;
        }
    }

    public function createPayment()
    {

        try {
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');
            \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
            \Midtrans\Config::$is3ds = config("midtrans.is3ds");

            $params = [
                'transaction_details' => [
                    'order_id' => $this->orderId,
                    'gross_amount' => $this->totalAmount,
                ],
                'customer_details' => [
                    'first_name' => $this->namaLengkap,
                    'email' => $this->email,
                    'phone' => $this->phone
                ]
            ];

            $this->saveTransaction();

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return redirect()->route('payment', ['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            logger()->error('Error generating snapToken: ' . $e->getMessage());
            $this->addError('snapToken', 'Gagal mendapatkan Snap Token. Silakan coba lagi.');
        }
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
            $this->infaqSistemAmount = 2000;
        } else {
            $this->infaqSistemAmount = 0;
        }
        $this->totalAmount = $this->amount + $this->infaqSistemAmount;
    }

    public function updatedAmount($value)
    {
        $this->totalAmount = $this->infaqSistemAmount + (int)$value;
    }

    public function saveTransaction()
    {
        $transaction = Transaction::create([
            'order_id' => $this->orderId,
            'campaign_id' => $this->campaignId ?? null,
            'fundraiser_id' => $this->fundraiserId ?? null,
            'infaq_sistem' => $this->infaqSistem,
            'donor_name' => $this->namaLengkap,
            'email' => $this->email,
            'phone' => $this->phone,
            'anonim' => $this->anonim,
            'pray' => $this->doa,
            'gross_amount' => $this->totalAmount,
        ]);
    }

    public function authLogin()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect(url('/checkout/' . $this->slug));
        } else {
            $this->addError('login', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
 