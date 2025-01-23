# Menggunakan PHP image dengan fpm
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install PHP extensions yang diperlukan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif bcmath gd zip

# Install Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# Copy seluruh file ke dalam container
COPY . .

# Install dependencies Laravel dan Node.js
RUN composer install --no-dev --optimize-autoloader
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install && \
    npm run build

# Atur permissions untuk Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Expose port untuk Vite (3000) dan Laravel (8000)
EXPOSE 3000
EXPOSE 8000

# Jalankan server Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
