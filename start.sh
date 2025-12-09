#!/bin/sh
set -e

# Esperar por la DB (intentos limitados)
MAX_TRIES=30
i=0
until php -v >/dev/null 2>&1; do
  i=$((i+1))
  if [ $i -ge $MAX_TRIES ]; then
    echo "PHP no está disponible después de esperar. Aborting."
    exit 1
  fi
  echo "Esperando entorno PHP... intento $i/$MAX_TRIES"
  sleep 1
done

# Intentar migraciones con reintentos para esperar DB si hace falta
i=0
until php artisan migrate --force >/dev/null 2>&1; do
  i=$((i+1))
  echo "Intento de migración $i/$MAX_TRIES"
  if [ $i -ge $MAX_TRIES ]; then
    echo "No se pudo conectar a la DB para migrar. Continuo de todos modos."
    break
  fi
  sleep 2
done

# Crear storage link (si no existe) - permite servir storage/app/public desde public/storage
php artisan storage:link || true

# Cache de config (opcional)
php artisan config:cache || true
php artisan route:cache || true || true

# Ejecutar el servidor embebido de PHP en el puerto 8000
exec php artisan serve --host=0.0.0.0 --port=8000
