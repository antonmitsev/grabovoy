FROM php:7.4-apache
# This seems to be valid by default
WORKDIR /var/www/html/
COPY ./www/. /var/www/
EXPOSE 80
