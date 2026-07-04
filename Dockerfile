FROM php:8.0-apache

# Apache module conflict fix karne ke liye
RUN a2dismod mpm_event && a2enmod mpm_prefork

# Files copy karein
COPY . /var/www/html/

# DocumentRoot ko public_html par point karein
RUN sed -i 's|/var/www/html|/var/www/html/public_html|g' /etc/apache2/sites-available/000-default.conf

# Permissions sahi karein
RUN chown -R www-data:www-data /var/www/html