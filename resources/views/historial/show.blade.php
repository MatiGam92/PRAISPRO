{{-- resources/views/historial/show.blade.php --}}
<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <a href="{{ route('historial.index') }}" 
           class="text-green-400 hover:text-green-300 mb-6 inline-block">
            ← Volver al historial
        </a>

        <div class="bg-gray-800 text-white p-8 rounded-xl border border-gray-700">

            <h1 class="text-3xl font-bold mb-4">
                {{ $producto->name }}
            </h1>

            {{-- Imagen --}}
            @if ($producto->photo)
                <img src="{{ asset('storage/' . $producto->photo) }}" 
                     class="w-full h-64 object-cover rounded-lg mb-6"
                     alt="Imagen del producto">
            @endif

            {{-- Descripción --}}
            <p class="text-gray-300 mb-4">
                {{ $producto->description ?? 'Sin descripción' }}
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-gray-400 text-sm">Precio base</p>
                    <p class="font-bold">{{ $producto->base_price }} {{ $producto->base_currency }}</p>
                </div>

                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-gray-400 text-sm">Unidad</p>
                    <p class="font-bold">{{ $producto->unit }}</p>
                </div>

                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-gray-400 text-sm">Cantidad</p>
                    <p class="font-bold">{{ $producto->quantity }}</p>
                </div>

                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-gray-400 text-sm">IVA</p>
                    <p class="font-bold">{{ $producto->iva_rate }}%</p>
                </div>

                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-gray-400 text-sm">Margen de ganancia</p>
                    <p class="font-bold">{{ $producto->profit_margin }}%</p>
                </div>

            </div>

            <div class="mt-6 bg-green-900/30 border border-green-700 p-5 rounded-lg">
                <p class="text-green-300 text-sm">Precio final</p>
                <p class="text-3xl font-extrabold text-green-400">
                    {{ number_format($producto->final_price, 2) }} {{ $producto->final_currency }}
                </p>
            </div>

            <p class="text-gray-500 text-sm mt-6">
                Calculado el: {{ $producto->created_at->format('d/m/Y H:i') }}
            </p>

        </div>

    </div>
</x-app-layout>
