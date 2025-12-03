<x-app-layout>

    {{-- Contenedor principal: ocupa todo el alto disponible entre navbar y footer --}}
    <div class="flex-1 flex items-center justify-center px-4 py-2">

        <div class="max-w-xl w-full bg-black/90 backdrop-blur-md p-8 rounded-lg shadow-2xl">

            <div class="flex flex-col items-center space-y-8">

                {{-- Cuadro del Precio del Dólar --}}
                <div class="w-full p-4 bg-gray-700/90 shadow-xl rounded-lg border border-black">
                    <h3 class="text-xl font-bold text-white mb-4 text-center">
                        💵 Precio Actual del Dólar
                    </h3>

                    {{-- Aquí se muestra el dólar mediante Livewire --}}
                    @livewire('dollar-rate')

                </div>

                {{-- Botones de Navegación --}}
                <div class="w-full grid grid-cols-1 gap-4">

                    <a href="{{ route('calculator') }}"
                       class="flex items-center justify-center py-4 bg-green-900 hover:bg-green-600 text-white 
                              font-bold rounded-lg shadow-lg transition transform hover:scale-[1.03]">
                        <span class="text-2xl mr-3">🧮</span>
                        <span>Calculadora de Precios</span>
                    </a>

                    <a href="{{ route('buscador') }}" 
                       class="flex items-center justify-center py-4 bg-green-900 hover:bg-green-600 text-white 
                              font-bold rounded-lg shadow-lg transition transform hover:scale-[1.03]">
                        <span class="text-2xl mr-3">🔎</span>
                        <span>Buscador</span>
                    </a>

                    <a href="{{ route('historial.index') }}" 
                       class="flex items-center justify-center py-4 bg-green-900 hover:bg-green-600 text-white 
                              font-bold rounded-lg shadow-lg transition transform hover:scale-[1.03]">
                        <span class="text-2xl mr-3">📜</span>
                        <span>Historial</span>
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
