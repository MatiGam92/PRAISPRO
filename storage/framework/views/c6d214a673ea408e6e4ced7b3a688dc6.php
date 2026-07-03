<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

?>

<div class="min-h-screen flex items-center justify-center bg-[#650000]">
    <!-- CUADRADO OSCURO SIN NINGÚN BORDE -->
    <div class="w-full max-w-2x1 p-8 bg-[#0e1423] rounded-lg border-0 outline-none shadow-none">
        <h2 class="text-center text-2xl font-bold text-white mb-2">
            Bienvenido a <span class="text-[#35d161]">PRAISPRO</span>
        </h2>
        <p class="text-center text-gray-400 mb-6">Inicia sesión para continuar</p>

        <form wire:submit.prevent="login">
            
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-300 mb-1">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-md bg-[#0e1423] border border-gray-700 text-gray-100
                           focus:border-[#35d161] focus:outline-none focus:ring-0 p-2"
                    wire:model="form.email" required autofocus autocomplete="username">
            </div>

            
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-300 mb-1">Contraseña</label>
                <input id="password" type="password"
                    class="w-full rounded-md bg-[#0e1423] border border-gray-700 text-gray-100
                           focus:border-[#35d161] focus:outline-none focus:ring-0 p-2"
                    wire:model="form.password" required autocomplete="current-password">
            </div>

            
            <div class="flex items-center justify-between mb-6 text-sm">
                <label class="flex items-center text-gray-300">
                    <input type="checkbox" class="mr-2 border-gray-700 bg-[#0e1423]" wire:model="form.remember">
                    Recordarme
                </label>
                <a href="#" class="text-[#35d161] hover:underline">¿Olvidaste tu contraseña?</a>
            </div>

            
            <button type="submit"
                class="w-full bg-[#35d161] text-[#0e1423] font-bold py-2 rounded-md hover:bg-[#2fb856] transition">
                Acceder
            </button>
            
            <a href="<?php echo e(route('register')); ?>"
               class="block w-full text-center mt-3 border border-[#35d161] text-[#35d161] font-bold py-2 rounded-md
                      hover:bg-[#35d161] hover:text-[#0e1423] transition">
                Crear cuenta
            </a>
        </form>

        <footer class="fixed bottom-0 left-0 right-0 p-4 bg-gray-900 text-center z-10">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            
            <a href="<?php echo e(url('/ia-team')); ?>"
               class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>
</div>
</div><?php /**PATH C:\xampp\htdocs\PRAISPRO\resources\views\livewire/pages/auth/login.blade.php ENDPATH**/ ?>