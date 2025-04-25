FROM php:7.1-apache

RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libzip-dev \
  && docker-php-ext-install pdo pdo_mysql mbstring gd

RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY ./.htaccess /var/www/html/.htaccess

EXPOSE 80
