FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring intl bcmath xml curl

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY composer.json composer.lock ./

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader || { cat /root/.composer/composer.log; exit 1; }

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
