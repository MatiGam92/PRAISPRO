#!/bin/sh
set -e

# 1. Crear un archivo .env vacío si no existe. 
# Esto evita que 'php artisan' falle buscando el archivo físico.
if [ ! -f .env ]; then
    echo "Creando archivo .env físico para compatibilidad..."
    touch .env
fi

# 2. Generar APP_KEY solo si no está definida en el panel de Render
if [ -z "$APP_KEY" ]; then
    echo "Generando APP_KEY local..."
    php artisan key:generate --force
fi

# 3. Optimizar Laravel
echo "Optimizando caché y configuraciones..."
php artisan storage:link --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Ejecutar migraciones (Opcional, pero recomendado si tienes DB)
echo "Ejecutando migraciones en PostgreSQL..."
# Opción A: Intentar limpiar y migrar. 
# Usamos || true para que si falla el borrado, el script no se detenga.
php artisan migrate:fresh --force || true

# Opción B: Si las tablas ya están ahí, simplemente intentar marcar las migraciones como hechas
php artisan migrate --force --strategy=fast-forward || php artisan migrate --force

# 5. Iniciar el servidor
echo "Servidor listo. Iniciando Laravel en puerto 8080..."
php artisan serve --host=0.0.0.0 --port=8080