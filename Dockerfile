FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip unzip git curl \
    && docker-php-ext-install zip pdo pdo_mysql mbstring exif pcntl bcmath gd

# Increase memory limit (VERY IMPORTANT)
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory.ini

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy files
COPY . .

# Create env
RUN cp .env.example .env

# 🔥 IMPORTANT: allow superuser (fix nyingi za composer)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install dependencies (no scripts first)
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Laravel setup
RUN php artisan key:generate
RUN php artisan package:discover

# Permissions
RUN chown -R www-data:www-data /var/www

EXPOSE 80
CMD ["apache2-foreground"]
