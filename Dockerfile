FROM php:8.0-apache

# Copy all files to the Apache root
COPY . /var/www/html/

# Change directory structure directly instead of using 'sed'
# Ye command Apache ke default config ko overwrite kar degi
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public_html\n\
    <Directory /var/www/html/public_html>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html