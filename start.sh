#!/bin/sh

# Copiar .env.example si no existe .env
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Generar APP_KEY si falta
APP_KEY=$(grep APP_KEY .env | cut -d '=' -f2)

if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Migraciones (opcional)
php artisan migrate --force

# Crear enlace storage (si no existe)
if [ ! -L public/storage ]; then
    php artisan storage:link
fi

# Iniciar servidor embebido de Laravel
php artisan serve --host=0.0.0.0 --port=8080
