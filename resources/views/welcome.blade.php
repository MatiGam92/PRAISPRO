<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <title>Bienvenido a PRICEPRO</title>


    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Contorno rojo oscuro para el logo */
        .logo-outline {
            -webkit-text-stroke: 2px #7f1d1d;
        }
    </style>
</head>
<body class="antialiased relative overflow-hidden">

    {{-- Fondo --}}
    <div
        class="fixed inset-0 bg-cover bg-center -z-20"
        style="background-image: url('/images/fondo.jpg');">
    </div>

    {{-- Overlay muy oscuro (rojo/marrón) --}}
    <div class="fixed inset-0 bg-red-900/95 -z-10">

    {{-- Contenedor principal --}}
    <div class="min-h-screen flex flex-col items-center justify-start px-4 pt-16 pb-24 relative z-10">

        {{-- Header --}}
        <header class="text-center mb-10">
            <h1 class="text-3xl sm:text-3xl font-extrabold text-white flex flex-col items-center gap-6">
                Bienvenido a
                <x-pricepro-logo size="md" />
            </h1>

            <p class="text-xl text-gray-300 mt-4 max-w-xl mx-auto">
                Tu solución profesional para el cálculo de precios.
            </p>
        </header>

        {{-- Card central --}}
        <div
            class="bg-[#1f0f0b]/95 backdrop-blur-md p-8 sm:p-10 rounded-xl shadow-2xl
                    max-w-lg w-full text-center border border-red-500">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-8">
                ¡Accedé y empezá a calcular tus precios!
            </h2>

            {{-- Botón --}}
            <a
                href="{{ url('/login') }}"
                class="inline-block px-12 py-4
                       bg-red-700
                       hover:bg-red-500
                       hover:shadow-red-500/40
                       text-white text-xl font-semibold rounded-lg
                       transition-all duration-200
                       shadow-xl transform hover:scale-105">
                Acceder
            </a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="fixed bottom-0 left-0 right-0 p-3 bg-[#1f0f0b]/95 text-center z-20">
        <p class="text-sm text-gray-400">
            PRICEPRO® — Todos los derechos reservados.
        </p>
    </footer>

</body>
</html>
