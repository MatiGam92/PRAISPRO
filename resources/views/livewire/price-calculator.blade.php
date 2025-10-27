<form wire:submit.prevent="calculateAndSave" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto my-12">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Calculadora de Precios</h2>

    <div class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Foto</label>
            <input type="file" id="photo" wire:model="photo" class="mt-1 block w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
            @error('photo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="description" wire:model="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="base_price" class="block text-sm font-medium text-gray-700">Precio Base</label>
                <input type="number" id="base_price" wire:model="base_price" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('base_price') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="base_currency" class="block text-sm font-medium text-gray-700">Moneda Base</label>
                <select id="base_currency" wire:model="base_currency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="" disabled>Seleccione una moneda</option>
                    @foreach($exchangeRates as $currency => $rate)
                        <option value="{{ $currency }}">{{ $currency }}</option>
                    @endforeach
                </select>
                @error('base_currency') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="unit" class="block text-sm font-medium text-gray-700">Unidad</label>
                <select id="unit" wire:model="unit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="" disabled>Seleccione la unidad</option>
                        <option value="Global">Global</option>
                        <option value="m">m (Metro)</option>
                        <option value="m²">m² (Metro Cuadrado)</option>
                        <option value="m³">m³ (Metro Cúbico)</option>
                </select>
                @error('unit') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                <input type="number" id="quantity" wire:model="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('quantity') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="iva_rate" class="block text-sm font-medium text-gray-700">IVA (%)</label>
                <input type="number" id="iva_rate" wire:model="iva_rate" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('iva_rate') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="profit_margin" class="block text-sm font-medium text-gray-700">Ganancia (%)</label>
                <input type="number" id="profit_margin" wire:model="profit_margin" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('profit_margin') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <div>
            <label for="final_currency" class="block text-sm font-medium text-gray-700">Moneda de Precio Final</label>
            <select id="final_currency" wire:model="final_currency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" disabled>Seleccione una moneda</option>
                @foreach($exchangeRates as $currency => $rate)
                    <option value="{{ $currency }}">{{ $currency }}</option>
                @endforeach
            </select>
            @error('final_currency') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="mt-8">
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Calcular Precio
        </button>
    </div>
</form>