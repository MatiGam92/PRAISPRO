#!/bin/sh
set -e

# Crear el archivo .env copiándolo del example si no existe
if [ ! -f .env ]; then
    echo "Creando archivo .env desde .env.example..."
    cp .env.example .env
fi

# Ahora sí, generamos la llave
echo "Generando APP_KEY..."
php artisan key:generate --force

# ... el resto de tu script (migraciones, cache, etc.)
echo "Optimizando caché..."
php artisan config:cache

echo "Iniciando Laravel..."
php artisan serve --host=0.0.0.0 --port=8080