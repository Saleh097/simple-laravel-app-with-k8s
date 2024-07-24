# Dockerfile
FROM php:8.2-fpm

# Set environment variable for Composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT -1

# Install dependencies
RUN apt-get update \
    && apt-get install -y \
        libonig-dev \
        libzip-dev \
        zip \
        unzip \
        libpng-dev \
        curl \
        vim \
        iputils-ping

# Install pcntl extension
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pcntl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm --version

# Install Supervisor
RUN apt-get install -y supervisor

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY ./simple-lara /var/www/html

# Copy env file
COPY .env ./var/www/html

# Set working directory
WORKDIR /var/www/html

# Install and build JavaScript dependencies
RUN npm install
RUN npm run build

# Install Laravel dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set ownership and permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/public

# Expose port 8000 and start php-fpm server
EXPOSE 8000
CMD php artisan storage:link;php artisan key:generate;php artisan migrate;echo thisexecuted > /mes.txt;php artisan db:seed;php artisan serve --port=8000