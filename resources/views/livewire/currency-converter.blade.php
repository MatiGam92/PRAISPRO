<div class="max-w-6xl mx-auto mt-12 px-4">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- ========================
            IZQUIERDA → FORMULARIO
        ========================= --}}
        <div class="bg-[#1f0f0b]/95 p-8 rounded-lg border border-red-600 shadow-xl">

            <h2 class="text-2xl font-bold text-red-300 mb-6">
                Conversor de Monedas
            </h2>

            {{-- MONTO --}}
            <div class="mb-4">
                <label class="text-gray-300 text-sm">Monto</label>

                <input type="number"
                    step="0.01"
                    wire:model="amount"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b]
                    text-white border-red-500
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">
            </div>

            {{-- MONEDA ORIGEN --}}
            <div class="mb-4">
                <label class="text-gray-300 text-sm">Moneda</label>

                <select wire:model="from_currency"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">

                    <option value="">Seleccione</option>

                    @foreach($exchangeRates as $currency => $rate)
                        <option value="{{ $currency }}">{{ $currency }}</option>
                    @endforeach
                </select>
            </div>

            {{-- MONEDA DESTINO --}}
            <div class="mb-6">
                <label class="text-gray-300 text-sm">Moneda a convertir</label>

                <select wire:model="to_currency"
                    class="w-full mt-1 rounded-md bg-[#4f0f0b] text-white border-red-500
                    focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-red-600">

                    <option value="">Seleccione</option>

                    @foreach($exchangeRates as $currency => $rate)
                        <option value="{{ $currency }}">{{ $currency }}</option>
                    @endforeach
                </select>
            </div>

            {{-- BOTÓN --}}
            <button
                wire:click="convert"
                class="w-full py-3 bg-red-700 hover:bg-red-500 hover:shadow-red-500/40 
                text-white font-semibold rounded-md shadow-lg transition-all duration-200 transform hover:scale-105">

                Convertir
            </button>

        </div>

        {{-- ========================
            DERECHA → RESULTADO
        ========================= --}}
        <div class="flex items-start">

            @if($result)
                <div class="w-full bg-[#1f0f0b]/95 p-8 rounded-lg border border-red-600 shadow-xl">

                    <h3 class="text-xl font-bold text-red-300 mb-4">
                        Resultado
                    </h3>

                    <p class="text-4xl font-black text-orange-400 mb-4">
                        {{ number_format($result, 2, ',', '.') }} {{ $to_currency }}
                    </p>

                    <div class="text-sm text-gray-300 space-y-1">
                        <p>Origen: {{ $amount }} {{ $from_currency }}</p>
                        <p>Destino: {{ $to_currency }}</p>
                    </div>

                </div>
            @else
                <div class="w-full p-8 rounded-lg border border-dashed border-red-500 text-red-400 text-sm">
                    El resultado aparecerá aquí luego de convertir.
                </div>
            @endif

        </div>

    </div>
</div>