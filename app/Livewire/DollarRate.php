<?php

namespace App\Livewire; 

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Exception;

class DollarRate extends Component
{
    // Las variables públicas SIEMPRE deben ser inicializadas para evitar el error 'Undefined variable'.
    public $rate = null;
    public $lastUpdated = null;
    // NUEVA PROPIEDAD: Para mostrar mensajes de error al usuario
    public $errorMessage = null; 

    public function mount()
    {
        $this->fetchRate();
    }

    public function fetchRate()
    {
        // Limpiamos el error anterior antes de intentar de nuevo
        $this->errorMessage = null;
        
        try {
            // La API de exchangerate.host solo permite consultas HTTPS
            $response = Http::timeout(5)->get('https://api.exchangerate.host/latest?base=USD&symbols=ARS');

            if ($response->successful()) {
                $data = $response->json();

                // 1. Verificación de error interno de la API (es común que devuelvan 'success: false' con un código 200)
                if (isset($data['success']) && $data['success'] === false) {
                    $this->errorMessage = 'Error de la API: Estructura de datos inválida o servicio no disponible.';
                    \Log::error('La API de tipo de cambio reportó un error interno en el payload. Data: ' . json_encode($data));
                } 
                // 2. CORRECCIÓN PRINCIPAL: Verificar que 'rates' y 'ARS' existan.
                elseif (isset($data['rates']) && isset($data['rates']['ARS'])) {
                    $this->rate = number_format($data['rates']['ARS'], 2);
                    $this->lastUpdated = now()->setTimezone('America/Argentina/Buenos_Aires')->format('H:i:s');
                } else {
                    // Si el JSON es exitoso pero no tiene la estructura esperada.
                    $this->errorMessage = 'Error de formato: La respuesta de la API no contiene la tasa ARS.';
                    \Log::error('Fallo de estructura en la respuesta JSON (falta "rates" o "ARS"). Respuesta: ' . json_encode($data));
                }
            } else {
                // Manejo de errores de HTTP (4xx o 5xx).
                $this->errorMessage = 'Error de conexión HTTP: Código ' . $response->status();
                \Log::error('Error HTTP al consultar la API: ' . $response->status() . ' - Body: ' . $response->body());
            }
        } catch (Exception $e) {
            // Manejo de errores de conexión (timeout, DNS, etc.).
            $this->errorMessage = 'Error de red al intentar conectar con el servicio.';
            \Log::error('Excepción al obtener el tipo de cambio: ' . $e->getMessage());
        }

        // Si $this->rate sigue siendo null, la vista mostrará el mensaje de carga/error.
    }

    public function render()
    {
        return view('livewire.dollar-rate');
    }
}