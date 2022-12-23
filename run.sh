docker build -t grabovoy:latest .
docker container rm -f grab
docker run --name grab -d --restart unless-stopped -p 80:80 grabovoy:latest /bin/bash -c 'a2enmod rewrite; apache2-foreground'
