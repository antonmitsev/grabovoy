FROM php:7.4-apache
WORKDIR /var/www/html

COPY ./www/ ..
COPY ./www/html/ .

EXPOSE 80
