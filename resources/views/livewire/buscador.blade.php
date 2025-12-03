<div class="py-12 flex items-start justify-center w-full">

    <div class="w-full max-w-3xl px-2">

        <h2 class="text-2xl font-bold mb-6 text-center text-white drop-shadow">
            Buscar cálculos ya realizados
        </h2>

        <div class="flex justify-center">
            <div class="w-full max-w-xl relative">

                {{-- Barra de búsqueda --}}
                <div class="flex rounded-lg overflow-hidden border border-green-600 bg-[#1A1A1D]/90 backdrop-blur-sm shadow-xl">
                    <input 
                        type="text" 
                        wire:model.live="query" 
                        placeholder="Nombre del producto"
                        autocomplete="off"
                        class="w-full px-3 py-4 bg-[#2A2A2D]/90 text-white placeholder-gray-400 
                               focus:outline-none focus:ring-1 focus:ring-green-500 text-sm"
                    >

                    <button 
                        wire:click="buscar"
                        class="bg-green-900 text-white px-6 text-sm font-semibold 
                               hover:bg-green-700 active:bg-green-800 transition flex items-center"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="ml-2 hidden sm:inline">Buscar</span>
                    </button>
                </div>

                {{-- Resultados --}}
                @if(!empty($resultados))
                    <ul class="absolute z-20 w-full mt-2 bg-[#1A1A1D]/95 backdrop-blur-md 
                               border border-green-600 rounded-lg shadow-2xl max-h-72 overflow-y-auto text-sm">

                        @foreach($resultados as $producto)
                            <li 
                                class="px-4 py-3 hover:bg-[#2A2A2D]/90 cursor-pointer flex justify-between 
                                       items-center border-b border-gray-700 last:border-none transition"
                                onclick="window.location='{{ route('historial.index', $producto->id) }}'"
                            >
                                <span class="text-gray-200 font-medium">{{ $producto->name }}</span>
                                <span class="text-green-500 font-semibold">→</span>
                            </li>
                        @endforeach

                    </ul>
                @endif

                {{-- Sin resultados --}}
                @if(empty($resultados) && strlen($query) > 1)
                    <div class="absolute z-20 w-full mt-2 bg-[#1A1A1D]/95 backdrop-blur-md 
                                border border-green-600 rounded-lg shadow-xl px-4 py-3 
                                text-center text-gray-400 text-sm">
                        No se encontraron productos que coincidan con la búsqueda.
                    </div>
                @endif

            </div>
        </div>

    </div>

</div>
