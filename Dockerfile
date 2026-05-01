FROM php:8.3-cli

# Instalar dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader



#  Instalar Node.js y NPM (necesario para Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# . Copiar el código y asegurarse de que el directorio de trabajo es el correcto
WORKDIR /var/www/html
COPY . .


# . Instalar dependencias de JS y compilar los assets
RUN npm install && npm run build

# . (Opcional) Ajustes de permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


# Exponer el puerto dinámico de Render
EXPOSE 10000

# Limpiar caché, configurar clave, migrar y arrancar el servidor
CMD php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000