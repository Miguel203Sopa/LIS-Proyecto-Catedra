FROM php:8.2-fpm

RUN rm -rf /var/lib/apt/lists/* \
    && apt-get clean \
    && apt-get update \
    && apt-get install -y nginx

COPY nginx.conf /etc/nginx/nginx.conf