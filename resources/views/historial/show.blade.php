{{-- resources/views/historial/show.blade.php --}}
<x-app-layout>

    {{-- Contenedor principal --}}
    <div class="max-w-6xl mx-auto px-6 pt-3 pb-18">

        {{-- Card --}}
        <div class="bg-[#1f0f0b]/95 text-white p-6 rounded-xl border border-red-500">

            {{-- GRID PRINCIPAL --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- =========================
                    COLUMNA IZQUIERDA: IMAGEN
                ========================= --}}
                <div>
                    @if ($producto->photo)
                        <img
                            src="{{ asset('storage/' . $producto->photo) }}"
                            alt="Imagen del producto"
                            class="w-full max-h-[360px] object-cover rounded-lg border border-red-500"
                        >
                    @else
                        <div
                            class="w-full max-h-[360px] min-h-[260px]
                                   flex items-center justify-center
                                   rounded-lg border border-dashed border-red-500
                                   text-gray-400 text-sm"
                        >
                            Sin imagen cargada
                        </div>
                    @endif
                </div>

                {{-- =========================
                    COLUMNA DERECHA: INFO
                ========================= --}}
                <div class="flex flex-col justify-between gap-6">

                    {{-- Datos --}}
                    <div>

                        <h1 class="text-2xl font-bold mb-2">
                            {{ $producto->name }}
                        </h1>

                        <p class="text-gray-300 mb-4 text-sm">
                            {{ $producto->description ?? 'Sin descripción' }}
                        </p>

                        <div class="grid grid-cols-2 gap-3 text-sm">

                            <div class="bg-[#5f0f0b] p-3 rounded-lg border border-red-500">
                                <p class="text-gray-400">Precio base</p>
                                <p class="font-semibold">
                                    {{ $producto->base_price }} {{ $producto->base_currency }}
                                </p>
                            </div>

                            <div class="bg-[#5f0f0b] p-3 rounded-lg border border-red-500">
                                <p class="text-gray-400">Unidad</p>
                                <p class="font-semibold">
                                    {{ $producto->unit }}
                                </p>
                            </div>

                            <div class="bg-[#5f0f0b] p-3 rounded-lg border border-red-500">
                                <p class="text-gray-400">Cantidad</p>
                                <p class="font-semibold">
                                    {{ $producto->quantity }}
                                </p>
                            </div>

                            <div class="bg-[#5f0f0b] p-3 rounded-lg border border-red-500">
                                <p class="text-gray-400">IVA</p>
                                <p class="font-semibold">
                                    {{ $producto->iva_rate }}%
                                </p>
                            </div>

                            <div class="bg-[#5f0f0b] p-3 rounded-lg border border-red-500 col-span-2">
                                <p class="text-gray-400">Margen de ganancia</p>
                                <p class="font-semibold">
                                    {{ $producto->profit_margin }}%
                                </p>
                            </div>

                        </div>

                    </div>

                    {{-- Precio final --}}
                    <div class="bg-orange-900/30 border border-orange-700 p-4 rounded-lg">
                        <p class="text-orange-300 text-xs">Precio final</p>
                        <p class="text-2xl font-extrabold text-orange-400">
                            {{ number_format($producto->final_price, 2) }}
                            {{ $producto->final_currency }}
                        </p>
                        <p class="text-gray-500 text-xs mt-1">
                            Calculado el: {{ $producto->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>

                </div>

            </div>

            {{-- =========================
                ACCIONES
            ========================= --}}
            <div class="mt-6 flex justify-between items-center pt-4 border-t border-red-500 text-sm">

                <a
                    href="{{ route('calculator', $producto->id) }}"
                    class="text-gray-200 hover:text-orange-500 transition"
                >
                    Editar
                </a>

                <button
                    type="button"
                    @click="openModal = true; productoToDelete = {{ $producto->id }}"
                    class="text-gray-200 hover:text-red-500 transition"
                >
                    Eliminar
                </button>

            </div>

        </div>

    </div>

</x-app-layout>
