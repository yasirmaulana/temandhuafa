<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class Checkout extends Component
{
    // #[Title('Checkout')]

    public $campaign;
    public $amount = 0;
    public $infaqSistem = true;
    public $anonim = false;
    public $namaLengkap = '';
    public $email = '';
    public $phone = '';
    public $totalAmount = 0;
    public $doa = '';
    public $infaqSistemAmount = 2000;

    public function mount($slug)
    {
        $this->campaign = Campaign::getCampaignBySlug($slug);

        $this->updateTotalAmount();
    }

    public function render()
    {
        return view('livewire.front.checkout');
    }

    public function updated($propertyName)
    {
        // Memperbarui totalAmount setiap kali properti tertentu diubah
        if (in_array($propertyName, ['amount', 'infaqSistem'])) {
            $this->updateTotalAmount();
        }
    }

    public function setAmount($value)
    {
        $this->amount = $value;
        $this->updateTotalAmount(); // Memperbarui totalAmount secara dinamis
    }


    private function updateTotalAmount()
    {
        $this->totalAmount = $this->amount + ($this->infaqSistem ? $this->infaqSistemAmount : 0);
    }

    public function bayar()
    {
        // Debugging data
        dd([
            'nama' => $this->namaLengkap,
            'email' => $this->email,
            'phone' => $this->phone,
            'infaqSistem' => $this->infaqSistem,
            'totalAmount' => $this->totalAmount,
            'doa' => $this->doa,
        ]);
    }
}
