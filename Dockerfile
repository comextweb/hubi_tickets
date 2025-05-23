# Usamos la imagen oficial de PHP 8.2 basada en FPM
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip 

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip


# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www

# Copiar archivos del proyecto
COPY . .


# Exponer el puerto 9000 y ejecutar PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]