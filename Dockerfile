FROM php:8.0-apache

# Modules install aur enable karein
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# DocumentRoot ko public_html mein point karein
RUN sed -i 's|/var/www/html|/var/www/html/public_html|g' /etc/apache2/sites-available/000-default.conf

# Files copy karein
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html