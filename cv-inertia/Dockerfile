FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
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

# Copy application code (excluding node_modules and vendor)
COPY cv-inertia/app ./app
COPY cv-inertia/bootstrap ./bootstrap
COPY cv-inertia/config ./config
COPY cv-inertia/database ./database
COPY cv-inertia/public ./public
COPY cv-inertia/resources ./resources
COPY cv-inertia/routes ./routes
COPY cv-inertia/storage ./storage
COPY cv-inertia/tests ./tests
COPY cv-inertia/.env.example ./.env.example
COPY cv-inertia/artisan ./artisan
COPY cv-inertia/vite.config.js ./vite.config.js
COPY cv-inertia/postcss.config.js ./postcss.config.js 2>/dev/null || true
COPY cv-inertia/tailwind.config.js ./tailwind.config.js 2>/dev/null || true
COPY cv-inertia/jsconfig.json ./jsconfig.json 2>/dev/null || true

# Generate autoload files
RUN composer dump-autoload --optimize

# Build frontend assets
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expose port
EXPOSE 8080

# Start command
CMD php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}