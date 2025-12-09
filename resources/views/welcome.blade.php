<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <title>Bienvenido a PRAISPRO</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased relative">

    {{-- Fondo e overlay --}}
    <div class="fixed inset-0 bg-cover bg-center -z-20" style="background-image: url('/images/ferre.avif');"></div>
    <div class="fixed inset-0 bg-red-800/90 -z-10"></div>

    {{-- Contenedor principal --}}
    <div class="min-h-[calc(100vh-64px)] flex flex-col items-center justify-center p-4 pt-20 pb-20 relative z-10">

        {{-- Header --}}
        <header class="text-center mb-8">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white flex flex-col items-center gap-4">
                Bienvenido a
                <x-praispro-logo class="h-20 w-auto" />
            </h1>
            <p class="text-xl text-gray-200 mt-2">
                Tu solución profesional para el cálculo de precios.
            </p>
        </header>

        {{-- Contenedor negro central --}}
        <div class="bg-black/90 p-8 sm:p-10 rounded-xl shadow-2xl max-w-lg w-full text-center mx-4 border-b-4 border-green-800">
            <h1 class="text-3xl sm:text-3xl font-extrabold text-white mb-8">
                ¡ Accedé y empezá a calcular tus precios !
            </h1>

            {{-- Botón --}}
            <a href="{{ url('/login') }}"
               class="inline-block px-10 py-4 bg-[#0E3D28] hover:bg-green-700 text-white text-xl font-semibold rounded-lg transition duration-300 shadow-xl transform hover:scale-105">
                Acceder
            </a>

            {{-- Nuevo Link "Manual de usuario" --}}
            <div class="mt-4">
                <a href="{{ asset('manual/Manual de usuario - PRAISPRO.pdf') }}"
                    target="_blank"
                    class="text-gray-400 hover:text-green-500 text-base font-medium transition duration-300 underline">
                    Manual de usuario
                </a>
            </div>
            
        </div>

    </div>

    {{-- Footer igual a app.blade --}}
    <footer class="fixed bottom-0 left-0 right-0 p-3 bg-black/90 text-center z-20">
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