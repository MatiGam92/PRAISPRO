<?php

// NOTA IMPORTANTE: Si usas Livewire 3 (el estándar actual),
// el namespace correcto DEBERÍA ser 'App\Livewire'
// En versiones antiguas (Livewire 2), a veces es 'App\Http\Livewire'
// Por favor, verifica tu versión de Livewire y ajusta el namespace si es necesario.
// Si el componente no funciona, cambia App\Http\Livewire a App\Livewire

namespace App\Http\Livewire; // 🚨 ¡ATENCIÓN! Si usas Livewire 3, probablemente esto es App\Livewire

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DollarRate extends Component
{
    // Las propiedades se inicializan a null para que Blade las encuentre inmediatamente.
    public $rate = null;
    public $lastUpdated = null;

    /**
     * Se ejecuta cuando el componente se inicializa.
     */
    public function mount()
    {
        // Llamamos a fetchRate para cargar los datos apenas se monte el componente.
        $this->fetchRate();
    }

    /**
     * Obtiene la tasa de cambio actual desde una API externa.
     */
    public function fetchRate()
    {
        // Usamos un bloque try-catch para manejar errores de conexión o de la API
        try {
            $response = Http::timeout(5)->get('https://api.exchangerate.host/latest?base=USD&symbols=ARS');

            if ($response->successful()) {
                $data = $response->json();
                // Verificación de que el índice 'ARS' existe en 'rates'
                if (isset($data['rates']['ARS'])) {
                    // Formateamos la tasa con dos decimales para mejor visualización
                    $this->rate = number_format($data['rates']['ARS'], 2);
                    $this->lastUpdated = now()->setTimezone('America/Argentina/Buenos_Aires')->format('H:i:s');
                } else {
                    // Log o manejo de error si el símbolo no está presente
                    \Log::warning('Símbolo ARS no encontrado en la respuesta de la API.');
                }
            } else {
                // Manejo de errores de HTTP (ej: 404, 500)
                \Log::error('Error al consultar la API de tipo de cambio: ' . $response->status());
            }
        } catch (\Exception $e) {
            // Manejo de errores de conexión (ej: timeout)
            \Log::error('Excepción al obtener el tipo de cambio: ' . $e->getMessage());
        }
    }

    /**
     * Renderiza la vista del componente.
     */
    public function render()
    {
        return view('livewire.dollar-rate');
    }
}