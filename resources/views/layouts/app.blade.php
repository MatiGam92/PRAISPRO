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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts

        {{-- Footer Fijo y Centrado --}}
    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-black text-center z-10">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            {{-- Link para IA-Team --}}
            <a href="{{ url('/ia-team') }}"
               class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>
    </body>
</html>
