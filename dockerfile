# Dockerfile para Laravel 12 con PHP 8.4
FROM php:8.4-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring zip gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP del proyecto
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Generar APP_KEY si no existe (esto es seguro en build; Render también puede generar APP_KEY)
RUN php artisan key:generate --force

# Dar permisos correctos (se ajustan al usuario www-data dentro del contenedor)
RUN chown -R www-data:www-data storage bootstrap/cache || true
RUN chmod -R 775 storage bootstrap/cache || true

# Copiar y dar permisos al script de arranque
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Puerto expuesto
EXPOSE 8000

# Ejecutar script de arranque
CMD ["/usr/local/bin/start.sh"]
