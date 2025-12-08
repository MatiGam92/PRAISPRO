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
    @livewireStyles
</head>

<body class="font-sans antialiased relative">

    <!-- Fondo -->
    <div class="fixed inset-0 bg-cover bg-center -z-20"
        style="background-image: url('/images/ferre.avif');">
    </div>

    <div class="fixed inset-0 bg-red-900/90 -z-10"></div>

    <!-- Navbar -->
    <div class="w-full z-10 relative">
        <livewire:layout.navigation />
    </div>

    <!-- Contenido general SIN SCROLL -->
    <div class="min-h-[calc(100vh-128px)] flex flex-col">


        @if (isset($header))
            <header class="bg-white/80 backdrop-blur-md shadow z-20 relative">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- MAIN ocupa todo el espacio disponible -->
        <main class="flex-1 z-10 relative">
            {{ $slot }}
        </main>

    </div>

    @livewireScripts

    <!-- Footer Fijo -->
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
