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
    <div class="fixed inset-0 bg-cover bg-center -z-10"
        style="background-image: url('/images/fondo.jpg');">
    </div>

    <div class="fixed inset-0 bg-red-900/90 -z-10"></div>

    <!-- Navbar -->
    <div class="w-full z-10 relative">
        <livewire:layout.navigation />
    </div>

    <!-- Contenido general SIN SCROLL -->
    <div class="min-h-[calc(100vh-140px)] flex flex-col">


        @if (isset($header))
            <header class="bg-white/80 backdrop-blur-md shadow z-20 relative">
                <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
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
    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-[#1f0f0b]/95 text-center z-20">
        <p class="text-sm text-gray-400">
            PRICEPRO® - Todos los derechos reservados.
        </p>
    </footer>

</body>

</html>
