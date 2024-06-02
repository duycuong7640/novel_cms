#!/bin/bash

# Di chuyển vào thư mục ứng dụng Laravel
cd /var/www/html

# Chạy lệnh migrate
php artisan migrate --force

# Khởi động Apache
apache2-foreground
