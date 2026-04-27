{{-- Input + Botón --}}
<div class="flex justify-center mb-6">
    <div class="flex gap-2 w-full max-w-xl">
        <input
            type="text"
            wire:model.debounce.400ms="query"
            placeholder="Buscar cálculo..."
            class="flex-1 rounded-lg px-3 py-2 text-sm
                   bg-[#1f0f0b] text-white border-red-500
                   focus:outline-none focus:ring-2 focus:ring-red-500"
        >

        <button
            wire:click="buscar"
            class="px-5 py-2 text-sm
                   bg-[#f00f0f] hover:bg-red-500 hover:shadow-red-500/40 text-white font-semibold rounded-md shadow-lg transition-all duration-200 transform hover:scale-105"
        >
            Buscar
        </button>
    </div>
</div>
