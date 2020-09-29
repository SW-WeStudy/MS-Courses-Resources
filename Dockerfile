# Dockerfile
FROM php:7.4-apache

RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
WORKDIR /var/www
ADD . /var/www
ADD ./public /var/www/html
RUN chown -R www-data:www-data /var/www

