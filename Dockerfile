FROM php:8.0-apache

# 1. Sabse pehle MPM (Multi-Processing Module) error fix karein
RUN a2dismod mpm_event && a2enmod mpm_prefork

# 2. Files copy karein
COPY . /var/www/html/

# 3. Apache DocumentRoot ko public_html par set karein
RUN sed -i 's|/var/www/html|/var/www/html/public_html|g' /etc/apache2/sites-available/000-default.conf

# 4. Permissions fix karein
RUN chown -R www-data:www-data /var/www/html