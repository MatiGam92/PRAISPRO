#!/bin/sh
set -e

# Si no hay APP_KEY en el entorno, la generamos
if [ -z "$APP_KEY" ]; then
    echo "Generando APP_KEY..."
    php artisan key:generate --force
fi

echo "Optimizando caché..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Creando storage link..."
php artisan storage:link --force || true

echo "Ejecutando migraciones..."
# Esto fallará si la DB no está configurada aún en Render, pero es normal
php artisan migrate --force

echo "Iniciando Laravel en puerto 8080..."
php artisan serve --host=0.0.0.0 --port=8080