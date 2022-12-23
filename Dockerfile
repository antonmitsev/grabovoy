FROM php:7.4-apache
WORKDIR /var/www/html

COPY www/html/ .
EXPOSE 80

# docker build -t grabovoy:latest .
# docker run --name grab -d --restart unless-stopped -p 80:80 grabovoy:latest /bin/bash -c 'a2enmod rewrite; apache2-foreground'
# docker container rm -f grab
