<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

    <!-- FONDO CON IMAGEN + OVERLAY ROJO -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center relative">

        <!-- Imagen de fondo -->
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('/images/ferre.avif');">
        </div>

        <!-- Capa roja con opacidad -->
        <div class="absolute inset-0 bg-red-900/90"></div>

        <!-- CONTENIDO -->
        <div class="relative z-10 w-full flex flex-col sm:justify-center items-center pt-18 sm:pt-0">

            <!-- LOGO MÁS GRANDE -->
            <div class="flex justify-center mb-6">
                <a href="/" wire:navigate>
                    <x-praispro-logo class="w-40 h-auto" />
                </a>
            </div>

            <!-- TARJETA DEL FORM -->
            <div class="w-full sm:max-w-md px-6 py-4 bg-black/90 shadow-2xl sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-black/90 text-center z-20">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            <a href="{{ url('/ia-team') }}"
               class="font-bold text-gray-200 hover:text-green-800 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>

</body>
</html>
