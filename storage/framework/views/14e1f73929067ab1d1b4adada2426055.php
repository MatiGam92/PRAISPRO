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

    
    <div class="min-h-screen flex flex-col items-center justify-center bg-red-800 p-4 pt-20 pb-20">

        
        
        
        <header class="text-center mb-8">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white">
                Bienvenido a <span class="text-green-400">PRAISPRO</span>
            </h1>
            <p class="text-xl text-gray-200 mt-2">Tu solución profesional para el cálculo de precios.</p>
        </header>


        
        <div class="bg-gray-900 p-8 sm:p-12 rounded-xl shadow-2xl max-w-lg w-full text-center mx-4 border-b-4 border-green-500">

            
            <h1 class="text-3xl sm:text-3xl font-extrabold text-white mb-8">
                ¡ Accedé y empezá a calcular tus precios !
            </h1>

            
            <a href="<?php echo e(url('/login')); ?>"
               class="inline-block px-10 py-4 bg-green-600 hover:bg-green-700 text-white text-xl font-semibold rounded-lg transition duration-300 shadow-xl transform hover:scale-105">
                Acceder
            </a>

            
            <!-- <?php if(Route::has('login')): ?> -->
                <div class="mt-6">
                    <!-- <?php if(auth()->guard()->check()): ?> -->
                        <a href="<?php echo e(url('/dashboard')); ?>" class="text-sm text-gray-400 hover:text-green-500 transition duration-300">Ir al Dashboard</a>
                    <!-- <?php endif; ?> -->
                </div>
            <!-- <?php endif; ?> -->

        </div>
    </div>

    
    <footer class="fixed bottom-0 left-0 right-0 p-4 bg-gray-900 text-center z-10">
        <p class="text-sm text-gray-400">
            PRAISPRO® - Todos los derechos reservados | Desarrollado por
            
            <a href="<?php echo e(url('/ia-team')); ?>"
               class="font-bold text-gray-200 hover:text-green-500 transition duration-300">
                IA-Team
            </a>
        </p>
    </footer>

</body>
</html><?php /**PATH C:\xampp\htdocs\PRAISPRO\resources\views/welcome.blade.php ENDPATH**/ ?>