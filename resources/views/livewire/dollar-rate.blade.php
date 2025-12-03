<div class="text-center p-6 bg-white shadow-xl rounded-xl max-w-sm mx-auto">
<!-- Tasa cargada exitosamente -->
@if ($rate)
<h3 class="text-xs font-semibold uppercase text-gray-500 mb-2">TASA DE CAMBIO (USD a ARS)</h3>
<p class="text-5xl font-extrabold text-green-600">
${{ $rate }}
</p>
<p class="text-sm text-gray-400 mt-3">
Última actualización: <span class="font-mono font-semibold text-gray-500">{{ $lastUpdated }}</span>
</p>
<!-- Botón para actualizar -->
<button wire:click="fetchRate" class="mt-4 px-4 py-2 text-xs font-bold text-white bg-blue-500 rounded hover:bg-blue-600 transition duration-150">
Actualizar Tasa
</button>

<!-- Cargando o Fallo -->
@else
    <!-- Si hay un mensaje de error, lo mostramos -->
    @if ($errorMessage)
        <div class="flex flex-col items-center justify-center h-24 text-red-600">
            <svg class="w-6 h-6 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856a2 2 0 001.912-2.757L13.732 3.34a2 2 0 00-3.464 0L3.398 16.243A2 2 0 005.31 19z"></path></svg>
            <p class="text-sm font-semibold">{{ $errorMessage }}</p>
            <button wire:click="fetchRate" class="mt-2 px-3 py-1 text-xs font-bold text-white bg-red-500 rounded hover:bg-red-600 transition duration-150">
                Reintentar
            </button>
        </div>
    @else
        <!-- Si no hay tasa ni mensaje de error, es que está cargando -->
        <div class="flex flex-col items-center justify-center h-24">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="text-lg font-bold text-gray-400 mt-2">Cargando...</p>
        </div>
    @endif
@endif


</div>