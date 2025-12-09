<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Producto;
use App\Services\ExchangeRateService;

//Extensión de la clase
class PriceCalculator extends Component
{
    use WithFileUploads;
//Atributos del componente
    public $producto_id;
    public $name;
    public $photo;
    public $description;
    public $base_price;
    public $base_currency = 'ARS';
    public $unit = '';
    public $quantity;
    public $iva_rate = 21;
    public $profit_margin = 25;
    public $final_currency = 'ARS';

    public $exchangeRates = [];
    public $final_price;

    public $existingPhoto;

    protected $rules = [
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image|max:5020',
        'description' => 'nullable|string',
        'base_price' => 'required|numeric|min:0',
        'base_currency' => 'required|string',
        'unit' => 'required|string|in:Global,m,m²,m³',
        'quantity' => 'required|integer|min:1',
        'iva_rate' => 'required|numeric|min:0',
        'profit_margin' => 'required|numeric|min:0',
        'final_currency' => 'required|string',
    ];

    public function mount($producto = null)
    {
        // Cargar cotizaciones de la api
        $this->exchangeRates = (new ExchangeRateService())->getRates();

        // Modo edición: precargar datos
        if ($producto) {
            $producto = Producto::find($producto);
            if ($producto) {
                $this->producto_id = $producto->id;
                $this->name = $producto->name;
                $this->description = $producto->description;
                $this->base_price = $producto->base_price;
                $this->base_currency = $producto->base_currency;
                $this->unit = $producto->unit;
                $this->quantity = $producto->quantity;
                $this->iva_rate = $producto->iva_rate;
                $this->profit_margin = $producto->profit_margin;
                $this->final_currency = $producto->final_currency;
                $this->final_price = $producto->final_price;
                $this->existingPhoto = $producto->photo;
            }
        }
    }

    //Ejecuta y guarda los cálculos
    public function calculateAndSave()
    {
        $this->validate();

        // 1) Convertir precio base a USD
        $rateToBase = $this->exchangeRates[$this->base_currency] ?? 1;
        $priceInUsd = $this->base_price / $rateToBase;

        // 2) Total por cantidad
        $totalCost = $priceInUsd * $this->quantity;

        // 3) Aplicar IVA
        $costWithIva = $totalCost * (1 + ($this->iva_rate / 100));

        // 4) Aplicar ganancia
        $priceWithProfit = $costWithIva * (1 + ($this->profit_margin / 100));

        // 5) Convertir al currency final
        $rateToFinal = $this->exchangeRates[$this->final_currency] ?? 1;
        $this->final_price = $priceWithProfit * $rateToFinal;

        // Guardar o actualizar
        if ($this->producto_id) {
            $producto = Producto::find($this->producto_id);
            $producto->update([
                'name' => $this->name,
                'description' => $this->description,
                'base_price' => $this->base_price,
                'base_currency' => $this->base_currency,
                'unit' => $this->unit,
                'quantity' => $this->quantity,
                'iva_rate' => $this->iva_rate,
                'profit_margin' => $this->profit_margin,
                'final_currency' => $this->final_currency,
                'final_price' => $this->final_price,
            ]);
        } else {
            $producto = Producto::create([
                'name' => $this->name,
                'description' => $this->description,
                'base_price' => $this->base_price,
                'base_currency' => $this->base_currency,
                'unit' => $this->unit,
                'quantity' => $this->quantity,
                'iva_rate' => $this->iva_rate,
                'profit_margin' => $this->profit_margin,
                'final_currency' => $this->final_currency,
                'final_price' => $this->final_price,
                'user_id' => auth()->id(),
            ]);
        }

        // Manejar foto
        if ($this->photo) {
            $imagePath = $this->photo->store('photos', 'public');
            $producto->photo = $imagePath;
            $producto->save();
        } elseif ($this->existingPhoto) {
            // Mantener foto existente
            $producto->photo = $this->existingPhoto;
            $producto->save();
        }

        return redirect()->route('historial.index');
    }

    //Muestra las operaciones ejecutadas por este componente.
    public function render()
    {
        return view('livewire.price-calculator')
            ->layout('layouts.app');
    }
}
