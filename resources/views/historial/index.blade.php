{{-- resources/views/historial/index.blade.php --}}
<x-app-layout>
    <div class="max-w-8xl mx-auto py-12 px-4 pb-32" x-data="{ openModal: false, productoToDelete: null }">

        <h1 class="text-2xl font-bold text-white mb-10 text-center">
            Historial de Cálculos
        </h1>

        @if ($productos->isEmpty())
            <div class="bg-gray-800 text-gray-300 p-8 rounded-xl border border-gray-700 text-center shadow-lg">
                Todavía no realizaste ningún cálculo.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($productos as $producto)
                    <div class="bg-black/90 hover:bg-gray-900 text-white p-6 rounded-xl 
                                border border-gray-700 shadow-md transition transform 
                                hover:scale-[1.02] relative flex flex-col">

                        {{-- Imagen --}}
                        @if ($producto->photo)
                            <img 
                                src="{{ asset('storage/' . $producto->photo) }}" 
                                class="w-full h-44 object-cover rounded-lg mb-4 shadow"
                                alt="Imagen del producto">
                        @else
                            <div class="w-full h-44 bg-[#2A2A2D] rounded-lg flex items-center justify-center text-gray-400 mb-4">
                                Sin imagen
                            </div>
                        @endif

                        {{-- Datos --}}
                        <h2 class="text-xl font-semibold truncate">
                            {{ $producto->name }}
                        </h2>

                        <p class="text-gray-400 text-sm mt-1 line-clamp-2">
                            {{ $producto->description ?? 'Sin descripción' }}
                        </p>

                        <p class="mt-4 font-bold text-green-400 text-lg">
                            Precio final: {{ number_format($producto->final_price, 2) }} {{ $producto->final_currency }}
                        </p>

                        <p class="text-gray-500 text-xs mt-3">
                            Fecha: {{ $producto->created_at->format('d/m/Y H:i') }}
                        </p>

                        {{-- BOTONES (EDITAR + ELIMINAR) --}}
                        <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-700">

                            {{-- Editar --}}
                            <a href="{{ route('calculator', $producto->id) }}"
                               class="flex items-center gap-2 text-gray-200 hover:text-green-500 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" 
                                    viewBox="0 0 24 24" stroke="currentColor" class="stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.125 19.586 3 21l1.414-4.125L16.862 3.487z"/>
                                </svg>
                                Editar
                            </a>

                            {{-- Eliminar --}}
                            <button type="button"
                                    @click="openModal = true; productoToDelete = {{ $producto->id }}"
                                    class="flex items-center gap-2 text-gray-200 hover:text-red-500 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" class="stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M6 7h12M9 7v10m6-10v10M4 7h16l-1 13a2 2 0 01-2 2H7a2 2 0 01-2-2L4 7zm3-3h10v3H7V4z"/>
                                </svg>
                                Eliminar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Modal Eliminar --}}
        <div x-show="openModal"
             x-transition
             class="fixed inset-0 bg-black/90 flex items-center justify-center z-50"
             style="display: none;">
            <div @click.away="openModal = false"
                 class="bg-gray-700 p-6 rounded-xl shadow-2xl w-96 text-center">

                <h3 class="text-lg font-bold text-white mb-4">¿Estás seguro?</h3>
                <p class="text-gray-200 mb-6">Esta acción eliminará permanentemente el cálculo.</p>

                <div class="flex justify-between space-x-4">
                    <button @click="openModal = false"
                            class="flex-1 py-2 bg-gray-900 hover:bg-green-700 text-white rounded">
                        Cancelar
                    </button>

                    <form :action="`/historial/${productoToDelete}`" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full py-2 bg-red-900 hover:bg-red-700 text-white rounded">
                            Eliminar
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
