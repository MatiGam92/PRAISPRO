<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    public function getRates(): array
    {
        $apiUrl = config('services.exchange_rate.url');

        try {

            $response = Http::get($apiUrl);

            if ($response->successful()) {

                $data = $response->json();

                /**
                 * Convertimos DolarAPI
                 * a formato compatible con tu app
                 */

                $oficial = collect($data)
                    ->firstWhere('casa', 'oficial');

                return [
                    'ARS' => 1,
                    'USD' => 1 / $oficial['venta'], // relación inversa
                ];
            }

        } catch (\Exception $e) {
            logger($e->getMessage());
        }

        // fallback
        return [
            'ARS' => 1,
            'USD' => 0.00073,
        ];
    }
}