#!/bin/bash

# Wait for MySQL to be ready
while ! mysqladmin ping -h"$DB_HOST" --silent; do
    sleep 1
done

# Install composer dependencies
composer install

# Run Laravel migrations
php artisan migrate --force

# Start Apache
exec "$@"
