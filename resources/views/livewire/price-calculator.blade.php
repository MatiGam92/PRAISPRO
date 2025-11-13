{{-- Fondo principal Rojo/Borgoña --}}
<div class="py-12 min-h-screen bg-[#881A1C]">
    {{-- Contenedor principal de la calculadora, más ancho para el formulario --}}
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        
        {{-- Formulario con Estilo PRAISPRO: Fondo Negro y Bordes Verdes --}}
        <form wire:submit.prevent="calculateAndSave" enctype="multipart/form-data" 
              class="bg-[#1A1A1D] p-8 rounded-lg shadow-2xl border border-gray-700">
            
            <h2 class="text-3xl font-bold mb-8 text-center text-white">
                Calculadora de Precios.
            </h2>

            <div class="space-y-6">
                
                {{-- Nombre del Producto --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nombre del Producto</label>
                    <input type="text" id="name" wire:model="name" 
                           class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                   shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-300 mb-1">Foto (Opcional)</label>
                    <input type="file" id="photo" wire:model="photo" 
                           class="mt-1 block w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md 
                                   file:border-0 file:text-sm file:font-semibold file:bg-green-600 file:text-white 
                                   hover:file:bg-green-700 hover:file:cursor-pointer transition duration-150">
                    @error('photo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Descripción --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Descripción</label>
                    <textarea id="description" wire:model="description" rows="3" 
                              class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                     shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150"></textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Precios y Monedas --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="base_price" class="block text-sm font-medium text-gray-300 mb-1">Precio Base</label>
                        <input type="number" id="base_price" wire:model="base_price" step="0.01" 
                               class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                      shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                        @error('base_price') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="base_currency" class="block text-sm font-medium text-gray-300 mb-1">Moneda Base</label>
                        <select id="base_currency" wire:model="base_currency" 
                                class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                       shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                            <option value="" disabled class="text-gray-500">Seleccione una moneda</option>
                            @foreach($exchangeRates as $currency => $rate)
                                <option value="{{ $currency }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                        @error('base_currency') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Unidades y Cantidad --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="unit" class="block text-sm font-medium text-gray-300 mb-1">Unidad</label>
                        <select id="unit" wire:model="unit" 
                                class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                       shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                            <option value="" disabled class="text-gray-500">Seleccione la unidad</option>
                            <option value="Global">Global</option>
                            <option value="m">m (Metro)</option>
                            <option value="m²">m² (Metro Cuadrado)</option>
                            <option value="m³">m³ (Metro Cúbico)</option>
                        </select>
                        @error('unit') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-300 mb-1">Cantidad</label>
                        <input type="number" id="quantity" wire:model="quantity" 
                               class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                      shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                        @error('quantity') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- IVA y Ganancia --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="iva_rate" class="block text-sm font-medium text-gray-300 mb-1">IVA (%)</label>
                        <input type="number" id="iva_rate" wire:model="iva_rate" step="0.01" 
                               class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                      shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                        @error('iva_rate') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="profit_margin" class="block text-sm font-medium text-gray-300 mb-1">Ganancia (%)</label>
                        <input type="number" id="profit_margin" wire:model="profit_margin" step="0.01" 
                               class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                      shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                        @error('profit_margin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                {{-- Moneda de Precio Final --}}
                <div>
                    <label for="final_currency" class="block text-sm font-medium text-gray-300 mb-1">Moneda de Precio Final</label>
                    <select id="final_currency" wire:model="final_currency" 
                            class="mt-1 block w-full rounded-md border-gray-600 bg-[#2A2A2D] text-white 
                                   shadow-sm focus:border-green-500 focus:ring-green-500 transition duration-150">
                        <option value="" disabled class="text-gray-500">Seleccione una moneda</option>
                        @foreach($exchangeRates as $currency => $rate)
                            <option value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                    @error('final_currency') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-10">
                <button type="submit" 
                        class="w-full py-3 px-4 border border-transparent rounded-lg shadow-xl 
                               text-lg font-bold text-white bg-green-600 hover:bg-green-700 
                               focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-500 
                               focus:ring-offset-[#1A1A1D] transition duration-200 uppercase tracking-widest">
                    Calcular y Guardar Precio
                </button>
            </div>
        </form>
    </div>
</div>


