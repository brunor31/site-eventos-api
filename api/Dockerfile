FROM php:8.2-apache

COPY ./config/ /etc/apache2/sites-available/

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    build-essential \
    vim 

RUN docker-php-ext-install pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite
RUN a2enmod headers
