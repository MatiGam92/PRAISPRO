#!/usr/bin/env bash
set -e

rm -f bootstrap/cache/config.php bootstrap/cache/routes-v7.php bootstrap/cache/events.php

php -r '$key = getenv("APP_KEY") ?: ""; $raw = str_starts_with($key, "base64:") ? base64_decode(substr($key, 7), true) : $key; fwrite(STDERR, "APP_KEY check: prefix=" . substr($key, 0, 7) . ", chars=" . strlen($key) . ", decoded_bytes=" . (is_string($raw) ? strlen($raw) : 0) . PHP_EOL); if (! is_string($raw) || ! in_array(strlen($raw), [16, 32], true)) { fwrite(STDERR, "Invalid APP_KEY for Laravel encryption. Set APP_KEY to the output of: php artisan key:generate --show" . PHP_EOL); exit(1); }'

php artisan migrate --force
php artisan optimize:clear
php artisan package:discover --ansi
php artisan storage:link --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

apache2-foreground
