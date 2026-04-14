FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy files
COPY . .

# 🔥 IMPORTANT: Create .env first
RUN cp .env.example .env

# 🔥 IMPORTANT: Install without scripts (avoid artisan crash)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Generate app key
RUN php artisan key:generate

# Now run scripts manually
RUN php artisan package:discover

# Permissions
RUN chown -R www-data:www-data /var/www

EXPOSE 80
CMD ["apache2-foreground"]
