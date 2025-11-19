<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'PRAISPRO')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased bg-[#8B1414] text-white">
    <!-- Contenedor general -->
    <div class="min-h-screen flex flex-col justify-center items-center px-4">
        <?php echo e($slot); ?>

    </div>

    <!-- Footer -->
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
</html>
<?php /**PATH C:\xampp\htdocs\PRAISPRO\resources\views/layouts/guest.blade.php ENDPATH**/ ?>