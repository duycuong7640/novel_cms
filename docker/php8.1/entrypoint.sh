#!/bin/bash

# Wait for MySQL to be ready
while ! mysqladmin ping -h"dicnovel_db" --silent; do
    echo "Waiting for database connection..."
    sleep 2
done

# Run migrations
php artisan migrate --force

# Start Apache
apache2-foreground
