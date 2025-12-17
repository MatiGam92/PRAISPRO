FROM php:8.4-fpm

# Instalar dependencias del sistema y extensiones de PHP
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \ apt-get install -y nodejs
    apt-get update && apt-get install -y \
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

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Instalar dependencias de JS y compilar activos con Vite
RUN npm install
RUN npm run build

# Permisos para carpetas de escritura
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Preparar el script de arranque
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Exponer el puerto que usaremos en Render
EXPOSE 8080

# Usar la ruta absoluta al script para evitar el error 128
ENTRYPOINT ["/usr/local/bin/start.sh"]