#!/bin/bash
composer install
npm ci
npm run build
php artisan key:generate
php artisan serve --host=0.0.0.0 --port 8000
