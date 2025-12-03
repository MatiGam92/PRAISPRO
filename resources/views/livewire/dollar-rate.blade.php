<div class="text-center">
    @if ($rate)
        <p class="text-5xl font-extrabold text-green-500">
            ${{ $rate }}
        </p>
        <p class="text-sm text-gray-300 mt-2">
            (Última actualización: <span class="font-mono">{{ $lastUpdated }}</span>)
        </p>
    @else
        <p class="text-5xl font-extrabold text-gray-400">Cargando...</p>
    @endif
</div>

