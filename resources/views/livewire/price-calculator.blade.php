<div class="flex justify-center px-6 pt-0 pb-12">



    <!-- Card más compacto -->
    <div class="w-full max-w-6xl bg-[#1f0f0b]/95 backdrop-blur-md 
            rounded-lg shadow-xl border border-red-500 p-8">


<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- =========================
        COLUMNA IZQUIERDA: FORM
    ========================= --}}
    <form wire:submit.prevent="calculateAndSave"
        enctype="multipart/form-data"
        class="lg:col-span-2 space-y-3">

        {{-- Nombre --}}
        <div>
            <label class="text-gray-300 text-xs">Nombre del Producto</label>
            <input type="text" wire:model="name"
                class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500
                    px-2 py-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600 text-sm">
        </div>

        {{-- Foto --}}
        <div>
            <label class="text-gray-300 text-xs">Foto (Opcional)</label>
            <input type="file" wire:model="photo"
                class="w-full mt-1 text-red-500 text-sm
                    file:bg-red-700 hover:file:bg-red-500 hover:file:shadow-red-500/40 file:text-white font-semibold file:rounded-md shadow-lg transition-all duration-200 transform hover:scale-105
                    file:px-3 file:py-1 ">
        </div>

        {{-- Descripción --}}
        <div>
            <label class="text-gray-300 text-xs">Descripción</label>
            <textarea wire:model="description" rows="3"
                class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500
                    px-2 py-1 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600"></textarea>
        </div>

        {{-- Precio + moneda --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-300 text-xs">Precio Base</label>
                <input type="number" wire:model="base_price" step="0.01"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm 
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
            </div>

            <div>
                <label class="text-gray-300 text-xs">Moneda Base</label>
                <select wire:model="base_currency"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm">
                    <option value="" disabled>Seleccione</option>
                    @foreach($exchangeRates as $currency => $rate)
                        <option value="{{ $currency }}">{{ $currency }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Unidad + Cantidad --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-300 text-xs">Unidad</label>
                <select wire:model="unit"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
                    <option value="" disabled>Seleccione</option>
                    <option value="Global">Global</option>
                    <option value="m">m</option>
                    <option value="m²">m²</option>
                    <option value="m³">m³</option>
                </select>
            </div>

            <div>
                <label class="text-gray-300 text-xs">Cantidad</label>
                <input type="number" wire:model="quantity"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
            </div>
        </div>

        {{-- IVA + Ganancia --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-300 text-xs">IVA (%)</label>
                <input type="number" wire:model="iva_rate" step="0.01"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
            </div>

            <div>
                <label class="text-gray-300 text-xs">Ganancia (%)</label>
                <input type="number" wire:model="profit_margin" step="0.01"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
            </div>
        </div>

        {{-- Moneda final --}}
        <div>
            <label class="text-gray-300 text-xs">Moneda Final</label>
            <select wire:model="final_currency"
                class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500 px-2 py-1 text-sm
                focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
                <option value="" disabled>Seleccione</option>
                @foreach($exchangeRates as $currency => $rate)
                    <option value="{{ $currency }}">{{ $currency }}</option>
                @endforeach
            </select>
        </div>

        {{-- Botón --}}
        <button
    type="submit"
    class="w-full mt-3 py-2 
           bg-red-700 hover:bg-red-500 hover:shadow-red-500/40 text-white font-semibold rounded-md shadow-lg transition-all duration-200 transform hover:scale-105">
    Calcular y Guardar
</button>

    </form>

    {{-- =========================
        COLUMNA DERECHA: RESULTADO
    ========================= --}}
    <div
        x-data
        x-on:calculo-guardado.window="$el.scrollIntoView({ behavior: 'smooth', block: 'start' })"
        class="lg:col-span-1 flex items-start">
        @if($resultado)
            <div class="w-full p-6 rounded-lg border border-red-700 bg-[#4f0f0b] text-red-100">

                <h3 class="text-xl font-bold mb-4 text-green-400">
                    Resultado del cálculo
                </h3>

                <p class="mb-2"><strong>{{ $resultado->name }}</strong></p>
                <p class="text-2xl font-bold text-red-300 mb-4">
                    {{ number_format($resultado->final_price, 2) }}
                    {{ $resultado->final_currency }}
                </p>

                <ul class="text-sm space-y-1">
                    <li>Cantidad: {{ $resultado->quantity }} {{ $resultado->unit }}</li>
                    <li>IVA: {{ $resultado->iva_rate }} %</li>
                    <li>Ganancia: {{ $resultado->profit_margin }} %</li>
                    <li>Base: {{ $resultado->base_price }} {{ $resultado->base_currency }}</li>
                </ul>

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('historial.show', $resultado->id) }}"
                        class="px-4 py-2 rounded-md bg-red-800 hover:bg-red-700 text-white text-sm">
                        Ver detalle
                    </a>
                    <a href="{{ route('historial.index') }}"
                        class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-600 text-white text-sm">
                        Historial
                    </a>
                </div>
            </div>
        @else
            <div class="w-full p-6 rounded-lg border border-dashed border-red-500 text-red-500 text-sm">
                El resultado del cálculo se mostrará aquí.
            </div>
        @endif
    </div>

</div>
