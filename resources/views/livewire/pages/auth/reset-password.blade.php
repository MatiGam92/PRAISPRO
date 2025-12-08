<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div class="bg-gray-600 p-8 sm:p-10 rounded-xl shadow-2xl border-b-4 border-[#0E3D28] text-white">

    {{-- Mensaje de éxito --}}
    @if (session('status'))
        <div class="mb-4 p-3 bg-green-700 text-white rounded-md">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit="resetPassword">

        {{-- Token oculto --}}
        <input type="hidden" wire:model="token">

        {{-- Email oculto (importante cuando viene en el enlace del correo) --}}
        <input type="hidden" wire:model="email">

        {{-- Email visible solo si querés que el usuario lo vea --}}
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input
                wire:model="email"
                id="email"
                type="email"
                name="email"
                required autofocus autocomplete="username"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md focus:ring-red-700 focus:border-red-700"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Nuevo Password')" class="text-white" />

            <x-text-input
                wire:model="password"
                id="password"
                type="password"
                name="password"
                required autocomplete="new-password"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md focus:ring-red-700 focus:border-red-700"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Password')" class="text-white" />

            <x-text-input
                wire:model="password_confirmation"
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
                class="block mt-1 w-full bg-white text-black border border-black rounded-md focus:ring-red-700 focus:border-red-700"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <button
                type="submit"
                class="px-5 py-3 bg-[#0E3D28] hover:bg-green-700 text-white font-semibold rounded-md shadow-lg transition transform hover:scale-105">
                {{ __('Restablecer Password') }}
            </button>
        </div>
    </form>
</div>

