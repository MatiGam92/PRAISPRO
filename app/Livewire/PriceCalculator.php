<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Http;
use App\Services\ExchangeRateService;
use Livewire\WithFileUploads;

class PriceCalculator extends Component
{
    
    use WithFileUploads;
    
    public $name;
    public $photo;
    public $description;
    public $base_price;
    public $base_currency = 'ARS'; // Valor por defecto
    public $unit;
    public $quantity;
    public $iva_rate = 21;
    public $profit_margin = 25;
    public $final_currency = 'ARS'; // Valor por defecto

    public $exchangeRates = [];
    public $final_price;
    
    // Reglas de validación
    protected $rules = [
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image|max:5020',
        'description' => 'nullable|string',
        'base_price' => 'required|numeric|min:0',
        'base_currency' => 'required|string',
        'unit' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'iva_rate' => 'required|numeric|min:0',
        'profit_margin' => 'required|numeric|min:0',
        'final_currency' => 'required|string',
    ];

    public function mount(ExchangeRateService $exchangeRateService)
    {
        // Inyecta el servicio y usa su método para obtener las cotizaciones
        $this->exchangeRates = $exchangeRateService->getRates();
    }



    public function calculateAndSave()
    {
        $this->validate();

        // 1. Convert base price to a standard currency (USD) for calculation consistency.
    $rateToBase = $this->exchangeRates[$this->base_currency] ?? 1;
    $priceInUsd = $this->base_price / $rateToBase;

    // 2. Calculate the total cost including quantity.
    $totalCost = $priceInUsd * $this->quantity;

    // 3. Apply IVA (21%). This is typically a tax on the product's cost.
    $costWithIva = $totalCost * (1 + ($this->iva_rate / 100));

    // 4. Apply the profit margin (25%) on top of the cost with IVA.
    $priceWithProfit = $costWithIva * (1 + ($this->profit_margin / 100));

    // 5. Convert the final calculated price back to the desired final currency.
    $rateToFinal = $this->exchangeRates[$this->final_currency] ?? 1;
    $this->final_price = $priceWithProfit * $rateToFinal;

        // Guardar el producto en la base de datos
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
        ]);
        
        // Manejar la carga de la imagen
        if ($this->photo) {
            $imagePath = $this->photo->store('photos', 'public');
            $producto->photo = $imagePath;
            $producto->save();
        }

        return redirect()->route('productos.show', $producto->id);
    }

    
    //protected static string $layout = 'layouts.app';
    
    public function render()
    {
        return view('livewire.price-calculator')
        ->layout('layouts.app');
    }
}
