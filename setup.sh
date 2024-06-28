#!/bin/bash

# Exit immediately if a command exits with a non-zero status.
set -e

echo "Running composer install..."
composer install

echo "Generating application key..."
php artisan key:generate

echo "Running migrations..."
php artisan migrate

echo "Creating storage symbolic link..."
php artisan storage:link

echo "Seeding the database..."
php artisan db:seed

echo "Installing npm dependencies..."
npm install

echo "Running npm dev build..."
npm run dev

echo "Setup complete!"
