#!/bin/bash
set -e

echo "=== Starting deployment ==="

# Wait for database to be ready
echo "Waiting for database..."
until php artisan db:show 2>/dev/null; do
    echo "Database not ready, waiting..."
    sleep 2
done

echo "Database is ready!"

# Run migrations (sin --fresh, para no borrar datos)
echo "Running migrations..."
php artisan migrate --force

# Solo ejecutar seeders si las tablas están vacías
echo "Checking if database needs seeding..."
if php artisan tinker --execute="echo \App\Models\Person::count();" | grep -q "^0$"; then
    echo "Database is empty, running seeders..."
    php artisan db:seed --force
else
    echo "Database already has data, skipping seeders..."
fi

# Clear and cache configurations
echo "Optimizing application..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Deployment complete, starting services ==="

# Start supervisord
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf