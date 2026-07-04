FROM php:8.0-apache

# Poora folder copy karein
COPY . /var/www/html/

# Apache DocumentRoot ko public_html par point karein
RUN sed -i 's|/var/www/html|/var/www/html/public_html|g' /etc/apache2/sites-available/000-default.conf

# Permissions set karein
RUN chown -R www-data:www-data /var/www/html