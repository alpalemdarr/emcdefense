FROM serversideup/php:8.4-fpm-nginx

WORKDIR /var/www/html

USER root

# Copy application files
COPY --chown=www-data:www-data . /var/www/html

# Add startup initialization script to entrypoint.d
COPY --chmod=755 docker/99-laravel-init.sh /etc/entrypoint.d/99-laravel-init.sh

USER www-data

# Install production dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

USER root

# Ensure permissions
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

USER www-data

EXPOSE 8080
