FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    nginx \
    supervisor \
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

# Copy composer files (ahora directamente, sin cv-inertia/)
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Copy package files (ahora directamente)
COPY package.json package-lock.json ./

# Install Node dependencies
RUN npm ci

# Copy entire project (ahora directamente)
COPY . .

# Generate autoload files
RUN composer dump-autoload --optimize

# Build frontend assets
RUN npm run build

# Copy configuration files
COPY docker/nginx.conf /etc/nginx/sites-available/default
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 755 /app/storage /app/bootstrap/cache && \
    chmod +x /usr/local/bin/entrypoint.sh

# Expose port
EXPOSE 10000

# Start command
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
