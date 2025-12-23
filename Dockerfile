FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Create non-root user
RUN useradd -ms /bin/bash laravel

# Change ownership
RUN chown -R laravel:laravel /var/www

# Switch user
USER laravel

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Prepare Laravel
RUN php artisan key:generate --force || true
RUN php artisan config:clear
RUN php artisan view:clear

# Expose Render port
EXPOSE 10000

# Start server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
