<x-app-layout>
    <div class="max-w-8xl mx-auto py-12 px-4 pb-32">

    

        {{-- Buscador --}}
        <livewire:buscador />

        {{-- Galería --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">

    @foreach ($productos as $producto)

        <a href="{{ route('historial.show', $producto) }}"
           class="bg-[#1f0f0b]/95 rounded-xl overflow-hidden
                  border border-red-500 
                  hover:shadow-lg hover:scale-[1.02]
                  transition transform">

            {{-- Imagen --}}
            <div class="h-40 bg-[#5f0f0f] flex items-center justify-center overflow-hidden">
                @if ($producto->photo)
                    <img
                        src="{{ asset('storage/' . $producto->photo) }}"
                        class="max-h-full max-w-full object-contain"
                        alt="Imagen del cálculo">
                @else
                    <span class="text-gray-500 text-sm">
                        Sin imagen
                    </span>
                @endif
            </div>

            {{-- Contenido --}}
            <div class="p-4 space-y-1">

                <h3 class="text-white font-semibold truncate">
                    {{ $producto->name }}
                </h3>

                <p class="text-orange-400 font-bold text-lg">
                    {{ number_format($producto->final_price, 2) }}
                    <span class="text-sm text-orange-300">
                        {{ $producto->final_currency }}
                    </span>
                </p>

                <p class="text-xs text-gray-500">
                    {{ $producto->created_at->format('d/m/Y') }}
                </p>

            </div>

        </a>

    @endforeach

</div>


    </div>
</x-app-layout>
