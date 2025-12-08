<div class="min-h-[calc(100vh-100px)] flex items-center justify-center px-10">

    <!-- Card más compacto -->
    <div class="w-full max-w-4xl bg-black/90 backdrop-blur-md 
                rounded-lg shadow-xl border border-gray-700 p-6">

        <h2 class="text-2xl font-bold text-center text-white mb-6">
            Calculadora de Precios
        </h2>

        <form wire:submit.prevent="calculateAndSave" enctype="multipart/form-data"
              class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Columna izquierda -->
            <div class="space-y-4">

                {{-- Nombre --}}
                <div>
                    <label class="text-gray-300 text-xs">Nombre del Producto</label>
                    <input type="text" wire:model="name"
                        class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                               px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
                </div>

                {{-- Foto --}}
                <div>
                    <label class="text-gray-300 text-xs">Foto (Opcional)</label>
                    <input type="file" wire:model="photo"
                        class="w-full mt-1 text-gray-400 text-sm
                               file:bg-green-900 file:text-white file:rounded-md 
                               file:px-3 file:py-1 hover:file:bg-green-700">
                </div>

                {{-- Descripción --}}
                <div>
                    <label class="text-gray-300 text-xs">Descripción</label>
                    <textarea wire:model="description" rows="3"
                        class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                               px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm"></textarea>
                </div>

            </div>

            <!-- Columna derecha -->
            <div class="space-y-4">

                {{-- Precio + moneda --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-gray-300 text-xs">Precio Base</label>
                        <input type="number" wire:model="base_price" step="0.01"
                            class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                                   px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
                    </div>

                    <div>
                        <label class="text-gray-300 text-xs">Moneda Base</label>
                        <select wire:model="base_currency"
                            class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                                   px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
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
                            class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600 
                                   px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
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
                            class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                                   px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
                    </div>
                </div>

                {{-- IVA + Ganancia --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-gray-300 text-xs">IVA (%)</label>
                        <input type="number" wire:model="iva_rate" step="0.01"
                            class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                                   px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
                    </div>

                    <div>
                        <label class="text-gray-300 text-xs">Ganancia (%)</label>
                        <input type="number" wire:model="profit_margin" step="0.01"
                            class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                                   px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
                    </div>
                </div>

                {{-- Moneda final --}}
                <div>
                    <label class="text-gray-300 text-xs">Moneda Final</label>
                    <select wire:model="final_currency"
                        class="w-full mt-1 rounded-md bg-[#2A2A2D] text-white border-gray-600
                               px-2 py-1 focus:ring-red-700 focus:border-red-700 text-sm">
                        <option value="" disabled>Seleccione</option>
                        @foreach($exchangeRates as $currency => $rate)
                            <option value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Botón ocupa ambas columnas -->
            <div class="md:col-span-2 mt-4">
                <button type="submit"
                    class="w-full py-2 text-base font-bold rounded-md 
                           bg-green-900 hover:bg-green-700 text-white 
                           shadow-md transition">
                    Calcular y Guardar
                </button>
            </div>

        </form>

    </div>

</div>
