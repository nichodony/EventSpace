
#!/bin/bash

set -e

echo "Memulai deployment EventSpace..."

cd /var/www/EventSpace

echo "Mengambil update dari GitHub..."
git pull origin main

echo "Menginstal dependency..."
composer install --no-dev --optimize-autoloader

echo "Menjalankan migrasi database..."
php artisan migrate --force

echo "Membersihkan dan memperbarui cache..."
php artisan optimize

echo "Deployment selesai!"
