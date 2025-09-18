<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    public function getRates(): array
    {
        // Obtiene la URL del archivo de configuración
        $apiUrl = config('services.exchange_rate.url');

        try {
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                return $response->json()['rates'];
            }
        } catch (\Exception $e) {
            // Manejar errores de conexión o API
        }

        // Tasas por defecto en caso de fallo
        return [
            'USD' => 1,
            'ARS' => 1000,
            'PYG' => 7500,
            'BRL' => 5.2,
            'EUR' => 0.92,
        ];
    }
}