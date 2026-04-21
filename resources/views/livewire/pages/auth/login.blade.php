<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('historial.index', absolute: false), navigate: true);
    }
}; ?>

<div class="bg-[#1f0f0b]/95 p-8 sm:p-8 rounded-xl shadow-2xl  text-white">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-red-500" :status="session('status')" />

    <form wire:submit="login">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input
                wire:model="form.email"
                id="email"
                type="email"
                name="email"
                required autofocus autocomplete="username"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md focus:ring-red-700 focus:border-red-500"
            />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white" />

            <x-text-input
                wire:model="form.password"
                id="password"
                type="password"
                name="password"
                required autocomplete="current-password"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md focus:ring-red-700 focus:border-red-500"
            />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input
                    wire:model="form.remember"
                    id="remember"
                    type="checkbox"
                    name="remember"
                    class="rounded border-red-500 bg-white text-red-500 focus:ring-red-500"
                >
                <span class="ms-2 text-sm text-white">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">

            <a href="{{ route('register') }}" wire:navigate
                    class="underline text-sm font-semibold text-white hover:text-red-500 transition">
                    {{ __('¿No estás registrado?') }}
                </a>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate
                    class="underline text-sm font-semibold text-white hover:text-red-500 transition">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <button
                type="submit"
                class="px-5 py-3 bg-red-700 hover:bg-red-500 hover:shadow-red-500/40 text-white font-semibold rounded-md shadow-lg transition-all duration-200 transform hover:scale-105">
                {{ __('Ingresar') }}
            </button>
        </div>
    </form>
</div>

