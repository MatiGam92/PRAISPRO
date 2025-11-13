<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a PRAISPRO</title>

    <!-- Carga de Tailwind CSS CDN (Simulación de  para el entorno Canvas) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased">

    {{-- Contenedor Principal y Fondo Rojo Oscuro --}}
    <div class="min-h-screen flex flex-col items-center justify-center bg-red-800 p-4 pt-20 pb-20">

        {{-- ----------------------------------------------------- --}}
        {{-- NUEVO: TÍTULO FUERA DEL CONTENEDOR CENTRAL (Más Grande) --}}
        {{-- ----------------------------------------------------- --}}
        <header class="text-center mb-8">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white">
                Bienvenido a <span class="text-green-500">PRAISPRO</span>
            </h1>
            <p class="text-xl text-gray-200 mt-2">Tu solución profesional para el cálculo de precios.</p>
        </header>


        {{-- Contenedor de la Nota (Centrado) --}}
        <div class="bg-black p-8 sm:p-12 rounded-xl shadow-2xl max-w-lg w-full text-center mx-4 border-b-4 border-green-500">

            {{-- Aquí ahora solo queda la llamada a la acción --}}
            <h1 class="text-3xl sm:text-3xl font-extrabold text-white mb-8">
                ¡ Accedé y empezá a calcular tus precios !
            </h1>

            {{-- Botón "Acceder" en color verde que redirecciona al login --}}
            <a href="{{ url('/login') }}"
               class="inline-block px-10 py-4 bg-green-600 hover:bg-green-700 text-white text-xl font-semibold rounded-lg transition duration-300 shadow-xl transform hover:scale-105">
                Acceder
            </a>

            {{-- Opcional: Si el usuario está logeado, mostrar un enlace al dashboard (Simulación) --}}
            <!-- @if (Route::has('login')) -->
                <div class="mt-6">
                    <!-- @auth -->
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-400 hover:text-green-500 transition duration-300">Ir al Dashboard</a>
                    <!-- @endauth -->
                </div>
            <!-- @endif -->

        </div>
    </div>

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