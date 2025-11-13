
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo de Desarrollo | PRAISPRO - IA-Team</title>
    <!-- Carga de Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Carga de Font Awesome (NO son emojis, son iconos vectoriales) para los iconos de redes sociales -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" xintegrity="sha512-Fo3rlrZj/k7ujTnHg4C+q94Kqf+b80+W1QG+lXf8y5FfLp3q/o1d2z5F9F6Fv/fR8t/vW/t9n5+g/o+5F4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Configuración de fuente Inter para mantener la consistencia moderna */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased">

    <!-- Contenedor Principal y Fondo Rojo Oscuro -->
    <div class="min-h-screen flex flex-col items-center justify-center bg-red-800 py-16 px-4">

        <!-- Contenedor Principal del Equipo (Centrado y Grande) -->
        <div class="bg-black p-6 sm:p-10 rounded-xl shadow-2xl max-w-2xl w-full text-center">

            <!-- Título Principal -->
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-10 border-b-4 border-green-500 pb-3 inline-block">
                <span class="text-green-500">IA</span>-Team
            </h1>

            <!-- Contenedor Flex para los Miembros (Uno debajo del otro) -->
            <div class="flex flex-col gap-6">

                <!-- Bloque del Miembro 1: Juan Pérez (Desarrollador Backend) -->
                <section class="bg-gray-800 p-6 rounded-xl text-left flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 transition duration-300 hover:bg-gray-700/50">
                    
                    <!-- Foto de Perfil (Placeholder) -->
                    <img src="https://placehold.co/120x120/374151/ffffff?text=JP" 
                         alt="Foto de Estefanía Montiel" 
                         class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-green-500/80" 
                         onerror="this.onerror=null; this.src='https://placehold.co/120x120/374151/ffffff?text=JP';">
                    
                    <!-- Información del Miembro -->
                    <div class="flex-grow text-center sm:text-left">
                        <h2 class="text-3xl font-bold text-white mb-1">Estefanía Montiel</h2>
                        <p class="text-md text-gray-400 italic">Desarrolladora Full-Stack y DBA</p>
                        
                        <!-- Íconos de Redes Sociales -->
                        <div class="flex justify-center sm:justify-start space-x-5 mt-3">
                            <!-- LinkedIn: REEMPLAZA '#' con el URL real de Juan Pérez -->
                            <a href="#" target="_blank" aria-label="LinkedIn de Juan Pérez" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-linkedin text-3xl"></i>
                            </a>
                            <!-- GitHub: REEMPLAZA '#' con el URL real de Juan Pérez -->
                            <a href="#" target="_blank" aria-label="GitHub de Juan Pérez" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-github text-3xl"></i>
                            </a>
                            <!-- Instagram: REEMPLAZA '#' con el URL real de Juan Pérez -->
                            <a href="#" target="_blank" aria-label="Instagram de Juan Pérez" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-instagram text-3xl"></i>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Bloque del Miembro 2: María Gómez (Diseñadora UI/UX) -->
                <section class="bg-gray-800 p-6 rounded-xl text-left flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 transition duration-300 hover:bg-gray-700/50">
                    
                    <!-- Foto de Perfil (Placeholder) -->
                    <img src="https://placehold.co/120x120/374151/ffffff?text=MG" 
                         alt="Foto de Lucas Oviedo" 
                         class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-green-500/80"
                         onerror="this.onerror=null; this.src='https://placehold.co/120x120/374151/ffffff?text=MG';">
                    
                    <!-- Información del Miembro -->
                    <div class="flex-grow text-center sm:text-left">
                        <h2 class="text-3xl font-bold text-white mb-1">Lucas Oviedo</h2>
                        <p class="text-md text-gray-400 italic">Desarrollador Full-Stack y Diseñador UX/UI</p>
                        
                        <!-- Íconos de Redes Sociales -->
                        <div class="flex justify-center sm:justify-start space-x-5 mt-3">
                            <!-- LinkedIn: REEMPLAZA '#' con el URL real de María Gómez -->
                            <a href="#" target="_blank" aria-label="LinkedIn de María Gómez" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-linkedin text-3xl"></i>
                            </a>
                            <!-- GitHub: REEMPLAZA '#' con el URL real de María Gómez -->
                            <a href="#" target="_blank" aria-label="GitHub de María Gómez" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-github text-3xl"></i>
                            </a>
                            <!-- Instagram: REEMPLAZA '#' con el URL real de María Gómez -->
                            <a href="#" target="_blank" aria-label="Instagram de María Gómez" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-instagram text-3xl"></i>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Bloque del Miembro 3: Carlos Ruiz (Desarrollador Frontend) -->
                <section class="bg-gray-800 p-6 rounded-xl text-left flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 transition duration-300 hover:bg-gray-700/50">
                    
                    <!-- Foto de Perfil (Placeholder) -->
                    <img src="https://placehold.co/120x120/374151/ffffff?text=CR" 
                         alt="Foto de Matías Gamarra" 
                         class="w-32 h-32 rounded-full object-cover shadow-lg border-4 border-green-500/80"
                         onerror="this.onerror=null; this.src='https://placehold.co/120x120/374151/ffffff?text=CR';">
                    
                    <!-- Información del Miembro -->
                    <div class="flex-grow text-center sm:text-left">
                        <h2 class="text-3xl font-bold text-white mb-1">Matías Gamarra</h2>
                        <p class="text-md text-gray-400 italic">Desarrollador Full-Stack y PM</p>
                        
                        <!-- Íconos de Redes Sociales -->
                        <div class="flex justify-center sm:justify-start space-x-5 mt-3">
                            <!-- LinkedIn: REEMPLAZA '#' con el URL real de Carlos Ruiz -->
                            <a href="#" target="_blank" aria-label="LinkedIn de Carlos Ruiz" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-linkedin text-3xl"></i>
                            </a>
                            <!-- GitHub: REEMPLAZA '#' con el URL real de Carlos Ruiz -->
                            <a href="#" target="_blank" aria-label="GitHub de Carlos Ruiz" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-github text-3xl"></i>
                            </a>
                            <!-- Instagram: REEMPLAZA '#' con el URL real de Carlos Ruiz -->
                            <a href="#" target="_blank" aria-label="Instagram de Carlos Ruiz" class="text-gray-400 hover:text-green-500 transition duration-200">
                                <i class="fab fa-instagram text-3xl"></i>
                            </a>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Espacio para el mensaje de cierre -->
            <p class="mt-10 text-lg text-gray-300">
                ¡Hacemos posible la calculadora de precios <span class="text-green-500 font-semibold">PRAISPRO</span>!
            </p>

        </div>
    </div>

    <!-- Footer Fijo y Centrado (Mismo estilo que el original) -->
    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-black text-center z-10">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            <a href="#" class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>

</body>
</html>