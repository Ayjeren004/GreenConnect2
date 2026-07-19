# Stage 1: Build PHP dependencies
FROM composer:latest as build-php
WORKDIR /app
COPY . .
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Stage 2: Build Node.js assets
FROM node:20 as build-node
WORKDIR /app
COPY . .
RUN npm install
RUN npm run build

# Stage 3: Setup Production Environment
FROM php:8.2-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_sqlite zip mbstring exif pcntl bcmath gd

WORKDIR /app

# Copy application files
COPY . .

# Copy built dependencies and assets from previous stages
COPY --from=build-php /app/vendor /app/vendor
COPY --from=build-node /app/public/build /app/public/build

# Setup environment
RUN cp .env.example .env
RUN php artisan key:generate

# Setup database
RUN mkdir -p database
RUN touch database/database.sqlite
RUN sed -i 's/DB_CONNECTION=mysql/DB_CONNECTION=sqlite/g' .env
RUN php artisan migrate --force

# Render assigns a dynamic port via the PORT environment variable
CMD php artisan serve --host=0.0.0.0 --port=$PORT
