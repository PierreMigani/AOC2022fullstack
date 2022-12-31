FROM php:fpm-alpine AS php
RUN apk update; \
    apk upgrade;

# step installing composer
FROM php AS composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# step installing phpunit
FROM composer AS phpunit
RUN curl -L https://phar.phpunit.de/phpunit.phar -o /usr/local/bin/phpunit \
    && chmod +x /usr/local/bin/phpunit

FROM phpunit AS xdebug
RUN apk add --no-cache \
    autoconf \
    libtool \
    pkgconf \
    re2c \
    gcc \
    musl-dev \
    linux-headers \
    make
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
