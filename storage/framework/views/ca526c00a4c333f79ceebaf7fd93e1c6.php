<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

?>

<div class="min-h-screen flex flex-col justify-center items-center bg-[#650000] text-white">
    <!-- CUADRADO OSCURO SIN BORDES -->
    <div class="w-full max-w-md p-8 bg-[#0e1423] rounded-lg border-0 outline-none shadow-none">
        <h2 class="text-center text-2xl font-bold text-white mb-2">
            Crear cuenta en <span class="text-[#35d161]">PRAISPRO</span>
        </h2>
        <p class="text-center text-gray-400 mb-6">Completa los datos para registrarte</p>

        <form wire:submit.prevent="register">
            
            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-300 mb-1">Nombre</label>
                <input id="name" type="text"
                    class="w-full rounded-md bg-[#0e1423] border border-gray-700 text-gray-100
                           focus:border-[#35d161] focus:outline-none focus:ring-0 p-2"
                    wire:model="name" required autofocus autocomplete="name">
            </div>

            
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-300 mb-1">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-md bg-[#0e1423] border border-gray-700 text-gray-100
                           focus:border-[#35d161] focus:outline-none focus:ring-0 p-2"
                    wire:model="email" required autocomplete="username">
            </div>

            
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-300 mb-1">Contraseña</label>
                <input id="password" type="password"
                    class="w-full rounded-md bg-[#0e1423] border border-gray-700 text-gray-100
                           focus:border-[#35d161] focus:outline-none focus:ring-0 p-2"
                    wire:model="password" required autocomplete="new-password">
            </div>

            
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm text-gray-300 mb-1">Confirmar contraseña</label>
                <input id="password_confirmation" type="password"
                    class="w-full rounded-md bg-[#0e1423] border border-gray-700 text-gray-100
                           focus:border-[#35d161] focus:outline-none focus:ring-0 p-2"
                    wire:model="password_confirmation" required autocomplete="new-password">
            </div>

            
            <button type="submit"
                class="w-full bg-[#35d161] text-[#0e1423] font-bold py-2 rounded-md hover:bg-[#2fb856] transition">
                Registrarme
            </button>

            
            <a href="<?php echo e(route('login')); ?>"
               class="block w-full text-center mt-3 border border-[#35d161] text-[#35d161] font-bold py-2 rounded-md
                      hover:bg-[#35d161] hover:text-[#0e1423] transition">
                Ya tengo una cuenta
            </a>
        </form>
    </div>

    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-gray-900 text-center z-10">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            
            <a href="<?php echo e(url('/ia-team')); ?>"
               class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>
</div><?php /**PATH C:\xampp\htdocs\PRAISPRO\resources\views\livewire/pages/auth/register.blade.php ENDPATH**/ ?>