<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink()
{
    $this->validate([
        'email' => ['required', 'string', 'email'],
    ]);

    // Verificar si el correo existe
    $user = \App\Models\User::where('email', $this->email)->first();

    if (! $user) {
        $this->addError('email', 'Este correo no está registrado.');
        return;
    }

    // Crear token
    $token = Str::random(60);

    // Guardar en tabla password_reset_tokens
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $this->email],
        [
            'token' => Hash::make($token),
            'created_at' => Carbon::now()
        ]
    );

    // Enviar el correo
    Mail::to($this->email)->send(new ResetPasswordMail($token, $this->email));

    session()->flash('status', 'Se envió un enlace de recuperación.');
}

}; ?>

<div class="bg-gray-600 p-8 sm:p-10 rounded-xl shadow-2xl border-b-4 border-[#0E3D28] text-white">

    <div class="mb-4 text-sm text-gray-300">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Solamente ingresá tu email y te enviaremos un enlace para que puedas restablecerla.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />

            <x-text-input
                wire:model="email"
                id="email"
                type="email"
                name="email"
                required autofocus
                class="block mt-1 w-full bg-white text-black  border-black rounded-md
                       focus:ring-red-700 focus:border-red-700"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <button
                type="submit"
                class="px-5 py-3 bg-[#0E3D28] hover:bg-green-700 text-white font-semibold rounded-md shadow-lg transition transform hover:scale-105">
                {{ __('Enviar enlace de recuperación') }}
            </button>
        </div>

    </form>
</div>

