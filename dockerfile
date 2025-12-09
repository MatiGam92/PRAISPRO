# Imagen base con PHP 8.4 FPM
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
    && docker-php-ext-configure gd \
        --with-jpeg \
        --with-freetype \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring zip gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar todo el proyecto
COPY . .

# Instalar dependencias de Laravel sin paquetes de desarrollo
RUN composer install --no-dev --optimize-autoloader

# Generar clave si no existe
RUN php artisan key:generate --force

# Dar permisos a storage y cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Puerto expuesto
EXPOSE 8000

# Comando de ejecución
CMD php artisan serve --host=0.0.0.0 --port=8000
