#!/bin/sh
set -e

echo "==> Initializing EMC Defense Laravel Application..."

# Ensure SQLite file exists if SQLite is used
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    mkdir -p /var/www/html/database
    touch /var/www/html/database/database.sqlite
    chown -R www-data:www-data /var/www/html/database
    chmod -R 775 /var/www/html/database
fi

# Ensure storage link
rm -rf /var/www/html/public/storage || true
php artisan storage:link --no-interaction || true

# Ensure storage permissions
chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage

# Run database migrations
echo "==> Running Migrations..."
php artisan migrate --force --no-interaction || true

# Seed database if needed (categories, products, admin user)
echo "==> Seeding Database..."
php artisan db:seed --force --no-interaction || true

# Clear and optimize cache
php artisan optimize:clear || true
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "==> EMC Defense is Ready!"
