FROM php:8.2-cli

# Install dependencies for Laravel and SQLite
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Setup environment
RUN cp .env.example .env

# Install Laravel dependencies
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Generate app key for production
RUN php artisan key:generate

# Set up SQLite database
RUN mkdir -p database
RUN touch database/database.sqlite
RUN sed -i 's/DB_CONNECTION=mysql/DB_CONNECTION=sqlite/g' .env
RUN php artisan migrate --force

# Render assigns a dynamic port via the PORT environment variable
CMD php artisan serve --host=0.0.0.0 --port=$PORT
