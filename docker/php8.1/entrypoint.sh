#!/bin/bash

# Wait for MySQL to be ready
#while ! mysqladmin ping -h"dicnovel_db" --silent; do
#    echo "Waiting for database connection..."
#    sleep 2
#done

# Install Composer dependencies
php composer.phar install

# Set permissions for storage and public/storage
chown -R www-data:www-data /var/www/html/storage /var/www/html/public/storage

# Run migrations
php artisan migrate --force

# Start Apache
apache2-foreground
