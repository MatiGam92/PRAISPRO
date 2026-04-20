<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
};
?>

<nav x-data="{ open: false }" class="bg-[#1f0f0b]/95 border-red-800">
    <div class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Logo y enlaces principales --}}
            <div class="flex items-center">
                {{-- Logo PRAISPRO --}}
                <a href="{{ route('historial.index') }}" wire:navigate class="flex items-center">
                    <x-pricepro-logo class="h-12 w-auto" />
                </a>

                {{-- Enlaces de navegación principales --}}
                <div class="hidden space-x-8 sm:ms-10 sm:flex">
                    <x-nav-link :href="route('calculator')" :active="request()->routeIs('calculator')" wire:navigate class="text-white hover:text-red-500">
                        {{ __('Calculadora') }}
                    </x-nav-link>


                    <x-nav-link :href="route('historial.index')" :active="request()->routeIs('historial.index')" wire:navigate class="text-white hover:text-red-500">
                        {{ __('Historial') }}
                    </x-nav-link>

                    <x-nav-link :href="route('converter')" :active="request()->routeIs('converter')" wire:navigate class="text-white hover:text-red-500">
                        {{ __('Conversor') }}
                    </x-nav-link>

                </div>
            </div>

            {{-- Botón de Cierre de Sesión (Escritorio) --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <button wire:click="logout" 
                        title="{{ __('Cerrar sesión') }}"
                        class="p-2 bg-[#1f0f0b]/95 hover:bg-red-700 text-white rounded-full 
                               shadow-md transition duration-150 ease-in-out focus:outline-none 
                               focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-[#1A1A1D]">
                    {{-- Icono de Lucide (logout) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" x2="9" y1="12" y2="12"/>
                    </svg>
                </button>
            </div>

            {{-- Botón móvil para abrir el menú --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 
                                hover:text-white hover:bg-[#2A2A2D] focus:outline-none 
                                focus:bg-[#2A2A2D] focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Menú responsive --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#1f0f0b]/95">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('historial.index')" :active="request()->routeIs('historial.index')" wire:navigate class="text-white">
                {{ __('historial.index') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('calculator')" :active="request()->routeIs('calculator')" wire:navigate class="text-white">
                {{ __('Calculadora') }}
            </x-responsive-nav-link>


            <x-responsive-nav-link :href="route('historial.index')" :active="request()->routeIs('historial.index')" wire:navigate class="text-white">
                {{ __('Historial') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('converter')" :active="request()->routeIs('converter')" wire:navigate class="text-white">
                {{ __('Conversor') }}
            </x-responsive-nav-link>

        </div>

        <div class="pt-4 pb-1 border-t border-red-700">
            <div class="px-4">
                {{-- Nombre de usuario y email (Móvil) --}}
                <div class="font-medium text-base text-white"
                     x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                     x-text="name"
                     x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-red-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                {{-- Botón de Cerrar Sesión (Móvil) --}}
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link class="text-white hover:bg-[#2A2A2D]">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
