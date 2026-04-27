FROM php:8.2-fpm

RUN apt-get update && apt-get install -y nginx

COPY nginx.conf /etc/nginx/nginx.conf

CMD service nginx start && php-fpm