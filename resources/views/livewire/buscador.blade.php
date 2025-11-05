<div class="flex justify-center mt-20">
    <div class="w-1/2 max-w-md relative">
        {{-- Campo + botón --}}
        <div class="flex shadow-md">
            <input 
                type="text" 
                wire:model.live="query" 
                placeholder="Buscar producto..."
                class="w-1/2 p-2 border border-red-400 rounded-l-lg text-center 
                       focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 
                       placeholder-gray-400 text-gray-700"
                autocomplete="off"
            >
            <button 
                wire:click="buscar"
                class="bg-red-500 text-cian px-5 font-semibold rounded-r-lg 
                       hover:bg-red-600 active:bg-red-700 transition duration-150"
            >
                Buscar
            </button>
        </div>

        {{-- Sugerencias --}}
        @if(!empty($resultados))
            <ul class="absolute z-10 w-full mt-2 bg-white border border-red-300 rounded-lg shadow-lg max-h-64 overflow-y-auto">
                @foreach($resultados as $producto)
                    <li 
                        class="p-3 hover:bg-red-50 cursor-pointer flex justify-between items-center transition"
                        onclick="window.location='{{ route('productos.show', $producto->id) }}'"
                    >
                        <span class="text-gray-800 font-medium">{{ $producto->name }}</span>
                        <span class="text-red-500 text-sm font-semibold">Ver</span>
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Mensaje si no hay resultados --}}
        @if(empty($resultados) && strlen($query) > 1)
            <div class="absolute z-10 w-full mt-2 bg-white border border-red-300 rounded-lg shadow-md p-3 text-center text-gray-500">
                No se encontraron productos
            </div>
        @endif
    </div>
</div>

