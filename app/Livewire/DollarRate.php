<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DollarRate extends Component
{
    public $rate = null;
    public $lastUpdated = null;

    public function mount()
    {
        $this->fetchRate();
    }

    public function fetchRate()
    {
        // API de ejemplo
        $response = Http::get('https://api.exchangerate.host/latest?base=USD&symbols=ARS');

        if ($response->successful()) {
            $data = $response->json();
            $this->rate = $data['rates']['ARS'];
            $this->lastUpdated = now()->format('H:i');
        }
    }

    public function render()
    {
        return view('livewire.dollar-rate');
    }
}
