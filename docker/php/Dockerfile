FROM php:8.1.3-apache-buster

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
        && docker-php-ext-configure gd \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-install pdo_mysql \
        && docker-php-ext-install mysqli \
        && docker-php-ext-install zip \
        && docker-php-source delete

RUN  a2enmod rewrite

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
# For phpMyAdmin dir
RUN mkdir -p /var/www/phpMyAdmin/bash
RUN touch  /var/www/phpMyAdmin/bash/bash.sh
RUN mkdir -p /var/www/phpMyAdmin/src