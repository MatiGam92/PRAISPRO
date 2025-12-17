# Etapa 1: Compilar activos de JS con Node
FROM node:20-slim AS node-builder
WORKDIR /app
COPY . .
RUN npm install && npm run build

# Etapa 2: Configurar el entorno PHP final
FROM php:8.4-fpm

# Instalar dependencias del sistema y extensiones de PHP
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

WORKDIR /var/www/html

# Copiar el proyecto
COPY . .

# TRAER LOS ARCHIVOS COMPILADOS DESDE LA ETAPA DE NODE
# Esto soluciona el error del manifest.json de Vite
COPY --from=node-builder /app/public/build ./public/build

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Script de arranque
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8080

ENTRYPOINT ["/usr/local/bin/start.sh"]