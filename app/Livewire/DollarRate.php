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
    public $errorMessage = null; 

    // URL de la nueva API alternativa (open.er-api.com)
    const API_URL = 'https://open.er-api.com/v6/latest/USD'; 

    public function mount()
    {
        $this->fetchRate();
    }

    public function fetchRate()
    {
        // Limpiamos el error anterior antes de intentar de nuevo
        $this->errorMessage = null;
        
        try {
            // Usamos la nueva URL API
            $response = Http::timeout(5)->get(self::API_URL);

            if ($response->successful()) {
                $data = $response->json();

                // 1. Verificación de error de la nueva API (si el resultado no es 'success')
                if (isset($data['result']) && $data['result'] !== 'success') {
                    $this->errorMessage = 'Error en el servicio externo (código: ' . ($data['error-type'] ?? 'desconocido') . ').';
                    \Log::error('La API reportó un error interno. Data: ' . json_encode($data));
                } 
                // 2. Verificación de la estructura de datos
                elseif (isset($data['rates']) && isset($data['rates']['ARS'])) {
                    $this->rate = number_format($data['rates']['ARS'], 2);
                    $this->lastUpdated = now()->setTimezone('America/Argentina/Buenos_Aires')->format('H:i:s');
                } else {
                    // Si el JSON es exitoso pero no tiene la estructura esperada.
                    $this->errorMessage = 'Error de formato: La respuesta de la API no contiene la tasa ARS.';
                    \Log::error('Fallo de estructura en la respuesta JSON. Respuesta: ' . json_encode($data));
                }
            } else {
                // Manejo de errores de HTTP (4xx o 5xx).
                $this->errorMessage = 'Error de conexión HTTP: Código ' . $response->status();
                \Log::error('Error HTTP al consultar la API: ' . $response->status() . ' - Body: ' . $response->body());
            }
        } catch (Exception $e) {
            // Manejo de errores de conexión (timeout, DNS, etc.).
            $this->errorMessage = 'Error de red al intentar conectar con el servicio: ' . $e->getMessage();
            \Log::error('Excepción al obtener el tipo de cambio: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dollar-rate');
    }
}