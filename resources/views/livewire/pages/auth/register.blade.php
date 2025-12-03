<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="bg-gray-600 p-8 sm:p-5 rounded-xl shadow-2xl border-b-4 border-[#0E3D28] text-white">

    <form wire:submit="register">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre de usuario')" class="text-white" />
            <x-text-input
                wire:model="name"
                id="name"
                type="text"
                name="name"
                required autofocus autocomplete="name"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md
                       focus:ring-red-700 focus:border-red-700"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input
                wire:model="email"
                id="email"
                type="email"
                name="email"
                required autocomplete="username"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md
                       focus:ring-red-700 focus:border-red-700"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-white" />

            <x-text-input
                wire:model="password"
                id="password"
                type="password"
                name="password"
                required autocomplete="new-password"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md
                       focus:ring-red-700 focus:border-red-700"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-white" />

            <x-text-input
                wire:model="password_confirmation"
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md
                       focus:ring-red-700 focus:border-red-700"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center justify-between mt-6">

            <a href="{{ route('login') }}" wire:navigate
               class="underline text-sm font-semibold text-white hover:text-red-700 transition">
                {{ __('¿Ya tenés cuenta?') }}
            </a>

            <button
                type="submit"
                class="px-5 py-3 bg-[#0E3D28] hover:bg-green-700 text-white font-semibold rounded-md shadow-lg
                       transition transform hover:scale-105">
                {{ __('Registrarme') }}
            </button>
        </div>

    </form>
</div>

