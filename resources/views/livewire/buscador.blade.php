{{-- Input + Botón --}}
<div class="flex justify-center mb-6">
    <div class="flex gap-2 w-full max-w-xl">
        <input
            type="text"
            wire:model.debounce.400ms="query"
            placeholder="Buscar cálculo..."
            class="flex-1 rounded-lg px-3 py-2 text-sm
                   bg-gray-800 text-white
                   focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >

        <button
            wire:click="buscar"
            class="px-5 py-2 text-sm
                   bg-indigo-600 hover:bg-indigo-700
                   text-white rounded-lg transition"
        >
            Buscar
        </button>
    </div>
</div>
