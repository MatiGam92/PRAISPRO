<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CurrencyConversion;
use App\Services\ExchangeRateService;
use Illuminate\Support\Facades\Http;

class CurrencyConverter extends Component
{
    public $amount;
    public $from_currency;
    public $to_currency;

    public $result = null;

    public $exchangeRates = [];

    public function mount()
    {
        $this->loadRates();
    }

    private function loadRates()
    {
        // USÁ la misma API que ya utilizás
        //$response = Http::get('TU_API_DE_MONEDAS');
        $this->exchangeRates = (new ExchangeRateService())->getRates();

        //$this->exchangeRates = $response->json('rates');
    }

    public function convert()
    {
        if (!$this->amount || !$this->from_currency || !$this->to_currency) {
            return;
        }

        $fromRate = $this->exchangeRates[$this->from_currency];
        $toRate   = $this->exchangeRates[$this->to_currency];

        $usdValue = $this->amount / $fromRate;
        $converted = $usdValue * $toRate;

        $this->result = round($converted, 2);

        CurrencyConversion::create([
            'amount' => $this->amount,
            'from_currency' => $this->from_currency,
            'to_currency' => $this->to_currency,
            'rate_used' => $toRate,
            'converted_amount' => $this->result,
        ]);
    }

    public function render()
    {
        return view('livewire.currency-converter');
    }
}
