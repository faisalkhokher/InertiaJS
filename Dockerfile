FROM php:7.4-apache as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis


WORKDIR /var/www
COPY . .

COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN composer install --no-dev --no-interaction --no-progress --optimize-autoloader

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# RUN php artisan key:generate
# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear 
RUN exec docker-php-entrypoint "$@"

CMD [ "/usr/sbin/apache2ctl" , "-D" , "FOREGROUND" ]

ENTRYPOINT [ "docker/entrypoint.sh" ]

# RUN php artisan serve --port=8000