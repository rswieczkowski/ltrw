FROM php:8.1.0-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip \
    default-mysql-client \
    libpq-dev \
 && docker-php-ext-install pdo pdo_mysql \
 && docker-php-ext-enable pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Xdebug (opcjonalnie)
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"

WORKDIR /var/www
