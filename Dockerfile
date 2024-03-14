# Use an official PHP 7.4 image as the base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && \
    apt-get install -y libzip-dev unzip && \
    docker-php-ext-install zip && \
    a2enmod rewrite

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --no-interaction --no-progress --optimize-autoloader

# Copy the rest of the Laravel files
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80
EXPOSE 80
