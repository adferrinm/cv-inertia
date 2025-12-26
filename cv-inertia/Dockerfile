FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_pgsql zip intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Copy composer files from cv-inertia
COPY cv-inertia/composer.json cv-inertia/composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copy package files from cv-inertia
COPY cv-inertia/package.json cv-inertia/package-lock.json ./

# Install Node dependencies
RUN npm ci

# Copy entire cv-inertia folder (excluding what's in .dockerignore)
COPY cv-inertia/ .

# Generate autoload files
RUN composer dump-autoload --optimize

# Build frontend assets
RUN npm run build

# Debug: Ver estructura completa del build
RUN echo "=== Build directory structure ===" && \
    find public/build -type f && \
    echo "=== Manifest check ===" && \
    (cat public/build/.vite/manifest.json 2>/dev/null || echo "No manifest in .vite") && \
    (cat public/build/manifest.json 2>/dev/null || echo "No manifest in root") && \
    echo "===" || true

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expose port
EXPOSE 8080

# Start command
CMD php artisan migrate:fresh --force && \
    php artisan db:seed --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}