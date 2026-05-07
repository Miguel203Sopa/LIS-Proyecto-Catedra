FROM php:8.2-apache-bookworm

RUN rm -rf /var/lib/apt/lists/* \
    && apt-get clean \
    && apt-get update \
    && apt-get install -y \
        libpq-dev \
        libsodium-dev \
        unzip \
        git \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        sodium \
    && apt-get clean

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /var/www/html/
RUN composer install --no-interaction --prefer-dist

RUN chown -R www-data:www-data /var/www/html
RUN sed -i 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

RUN sed -i 's!/var/www/!/var/www/html/public!g' \
    /etc/apache2/apache2.conf