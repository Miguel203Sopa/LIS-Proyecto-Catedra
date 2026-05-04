FROM php:8.2-apache-bookworm

RUN rm -rf /var/lib/apt/lists/* \
    && apt-get clean \
    && apt-get update \
    && apt-get install -y \
        libpq-dev \
        unzip \
        git \
    && docker-php-ext-install pdo pdo_pgsql \
    && apt-get clean

WORKDIR /var/www/html
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html