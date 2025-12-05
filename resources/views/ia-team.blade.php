<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo de Desarrollo | PRAISPRO - IA-Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased relative">

    <!-- Fondo con imagen + overlay rojo -->
    <div class="fixed inset-0 bg-cover bg-center -z-20" style="background-image: url('/images/ferre.avif');"></div>
    <div class="fixed inset-0 bg-red-900/90 -z-10"></div>

    <!-- Contenido principal -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12">

        <div class="max-w-6xl w-full bg-black/90 p-8 rounded-xl shadow-2xl">

            <!-- Título -->
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-10 text-center border-b-4 border-green-900 pb-3">
                <span class="text-green-900">IA</span>-Team
            </h1>

            <!-- Cards de integrantes: apaisados y compactos -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <!-- Integrante 1 -->
                <div class="bg-gray-800 p-4 rounded-xl flex flex-col items-center text-center transition duration-300 hover:bg-gray-700/50">
                    <img src="{{ asset('images/Estefi.jpeg') }}" 
                         alt="Estefanía Montiel"
                         class="w-28 h-28 rounded-full object-cover shadow-lg border-4 border-green-500/80 mb-4">
                    <h2 class="text-xl font-bold text-white mb-1">Estefanía Montiel</h2>
                    <p class="text-gray-400 text-sm italic mb-2">Full-Stack & PM</p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Integrante 2 -->
                <div class="bg-gray-800 p-4 rounded-xl flex flex-col items-center text-center transition duration-300 hover:bg-gray-700/50">
                    <img src="{{ asset('images/Lucas.jpeg') }}" 
                         alt="Lucas Oviedo"
                         class="w-28 h-28 rounded-full object-cover shadow-lg border-4 border-green-500/80 mb-4">
                    <h2 class="text-xl font-bold text-white mb-1">Lucas Oviedo</h2>
                    <p class="text-gray-400 text-sm italic mb-2">Full-Stack & UX/UI</p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Integrante 3 -->
                <div class="bg-gray-800 p-4 rounded-xl flex flex-col items-center text-center transition duration-300 hover:bg-gray-700/50">
                    <img src="{{ asset('images/Matias.jpeg') }}" 
                         alt="Matías Gamarra"
                         class="w-28 h-28 rounded-full object-cover shadow-lg border-4 border-green-500/80 mb-4">
                    <h2 class="text-xl font-bold text-white mb-1">Matías Gamarra</h2>
                    <p class="text-gray-400 text-sm italic mb-2">Full-Stack & SM</p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                        <a href="#" target="_blank" class="text-gray-400 hover:text-green-500">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Mensaje de cierre -->
            <div class="mt-8 text-center">
    <p class="text-gray-300 text-lg">
        ¡Hacemos posible la calculadora de precios!
    </p>

    <div class="flex justify-center mt-2">
        <x-praispro-logo class="h-10 w-auto" />
    </div>
</div>


        </div>

    </div>

    <!-- Footer fijo -->
    <footer class="fixed bottom-0 left-0 right-0 p-3 bg-black/90 text-center z-20">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            <a href="#" class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>

</body>
</html>
