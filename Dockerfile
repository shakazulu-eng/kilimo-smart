FROM php:8.4-apache

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

WORKDIR /var/www/html

# Copy files
COPY . /var/www/html

# Set Apache to serve Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

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
RUN chown -R www-data:www-data /var/www/

EXPOSE 80
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
# ["apache2-foreground"]
