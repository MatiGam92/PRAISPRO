<x-app-layout>
    {{-- La cabecera (Header) se deja vacía. El menú y Logout se gestionan en 'navigation.blade.php' --}}

    {{-- Contenido Principal con Fondo Rojo/Borgoña (bg-[#881A1C]) --}}
    <div class="py-12 min-h-screen bg-red-800">
        {{-- Contenedor más estrecho (max-w-xl) para centrar y concentrar el contenido --}}
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Caja contenedora negra (bg-[#1A1A1D]) --}}
            <div class="p-8 bg-[#1A1A1D] overflow-hidden shadow-2xl rounded-lg">
                
                {{-- Contenedor FLEX para apilar los elementos verticalmente (flex-col) y centrarlos --}}
                <div class="flex flex-col items-center space-y-8">
                    
                    {{-- 1. Cuadro del Precio del Dólar (Grande y Centrado) --}}
                    <div class="w-full p-6 bg-gray-800 shadow-xl rounded-lg border-2 border-gray-700">
                        <h3 class="text-xl font-bold text-white mb-4 text-center">
                            💵 Precio Actual del Dólar
                        </h3>
                        
                        <div class="text-center">
                            {{-- Placeholder del valor, grande y en color destacado --}}
                            <p class="text-5xl font-extrabold text-green-500">
                                $XX.XX
                            </p>
                            <p class="text-sm text-gray-400 mt-2">
                                (Última actualización: <span class="font-mono">HH:MM</span>)
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Fuente: API (implementar con Livewire)
                            </p>
                        </div>
                    </div>

                    {{-- 2. Botones de Navegación (Debajo del Dólar) --}}
                    {{-- Los botones se apilan en una columna --}}
                    <div class="w-full grid grid-cols-1 gap-4">
                        
                        {{-- Botón 1: Calculadora --}}
                        <a href="{{ route('price.calculator') }}" 
                           class="flex items-center justify-center py-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-lg transition duration-150 ease-in-out transform hover:scale-[1.03]">
                            <span class="text-2xl mr-3">🧮</span>
                            <span>Calculadora de Precios</span>
                        </a>

                        {{-- Botón 2: Historial (INHABILITADO/COMENTADO) --}}
                        {{-- 
                        <a href="{{ route('history') }}" 
                           class="flex items-center justify-center py-4 bg-gray-600 text-gray-300 font-bold rounded-lg shadow-lg transition duration-150 ease-in-out cursor-not-allowed opacity-75">
                            <span class="text-2xl mr-3">📜</span>
                            <span>Historial (Próximamente)</span>
                        </a> 
                        --}}
                        
                        {{-- Botón 3: Buscador --}}
                        <a href="{{ route('buscador') }}" 
                           class="flex items-center justify-center py-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-lg transition duration-150 ease-in-out transform hover:scale-[1.03]">
                            <span class="text-2xl mr-3">🔎</span>
                            <span>Buscador</span>
                        </a>
                    </div>
                </div> {{-- Fin de flex-col --}}
            </div>
        </div>
    </div>
    
    {{-- Footer Fijo y Centrado --}}
    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-black  text-center z-10">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            {{-- Link para IA-Team --}}
            <a href="{{ url('/ia-team') }}"
               class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>
</x-app-layout>
