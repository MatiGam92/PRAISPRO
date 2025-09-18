<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producto Calculado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">{{ $producto->name }}</h1>

                    @if($producto->photo)
                        <img src="{{ asset('storage/' . $producto->photo) }}" alt="{{ $producto->name }}" class="mb-4 rounded-lg">
                    @endif

                    <p class="text-gray-600 mb-2"><strong>Descripción:</strong> {{ $producto->description }}</p>
                    <p class="text-gray-600 mb-2"><strong>Cantidad:</strong> {{ $producto->quantity }} {{ $producto->unit }}</p>
                    <p class="text-gray-600 mb-2"><strong>Precio Base:</strong> {{ number_format($producto->base_price, 2) }} {{ $producto->base_currency }}</p>
                    <p class="text-gray-600 mb-2"><strong>IVA ({{ $producto->iva_rate }}%):</strong> {{ number_format($producto->base_price * ($producto->iva_rate / 100), 2) }} {{ $producto->base_currency }}</p>
                    <p class="text-gray-600 mb-2"><strong>Ganancia ({{ $producto->profit_margin }}%):</strong> {{ number_format($producto->base_price * ($producto->profit_margin / 100), 2) }} {{ $producto->base_currency }}</p>
                    <p class="text-2xl font-bold text-green-600 mt-4">
                        Precio Final: {{ number_format($producto->final_price, 2) }} {{ $producto->final_currency }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>