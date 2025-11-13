{{-- Contenedor Raíz Único para Livewire --}}
<div class="py-12 min-h-screen bg-[#881A1C]">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-8 text-center text-white">
            Buscar cálculos ya realizados.
        </h2>

        <div class="flex justify-center mt-8">
            <div class="w-full max-w-lg relative">
                
                {{-- Campo de Búsqueda + Botón --}}
                <div class="flex shadow-xl rounded-lg overflow-hidden border border-green-600">
                    <input 
                        type="text" 
                        wire:model.live="query" 
                        placeholder="Nombre del producto."
                        class="w-full p-3 border-none bg-[#2A2A2D] text-white placeholder-gray-400 
                               focus:outline-none focus:ring-2 focus:ring-green-500 
                               transition duration-150 text-base"
                        autocomplete="off"
                    >
                    <button 
                        wire:click="buscar"
                        class="bg-green-600 text-white px-5 font-semibold 
                               hover:bg-green-700 active:bg-green-800 transition duration-150 flex items-center justify-center"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="ml-2 hidden sm:inline">Buscar</span>
                    </button>
                </div>

                {{-- Sugerencias/Resultados --}}
                @if(!empty($resultados))
                    <ul class="absolute z-10 w-full mt-2 bg-[#1A1A1D] border border-green-600 rounded-lg shadow-2xl max-h-80 overflow-y-auto">
                        @foreach($resultados as $producto)
                            <li 
                                class="p-4 hover:bg-[#2A2A2D] cursor-pointer flex justify-between items-center transition duration-200 border-b border-gray-700 last:border-b-0"
                                onclick="window.location='{{ route('productos.show', $producto->id) }}'"
                            >
                                <span class="text-gray-200 font-medium">{{ $producto->name }}</span>
                                <span class="text-green-500 text-sm font-semibold hover:underline">Ver Detalle &rarr;</span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{-- Mensaje si no hay resultados --}}
                @if(empty($resultados) && strlen($query) > 1)
                    <div class="absolute z-10 w-full mt-2 bg-[#1A1A1D] border border-green-600 rounded-lg shadow-md p-4 text-center text-gray-400">
                        No se encontraron productos que coincidan con la búsqueda.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

