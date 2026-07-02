#!/usr/bin/env bash
set -e

php artisan migrate --force
php artisan optimize:clear
php artisan package:discover --ansi
php artisan storage:link --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

apache2-foreground
