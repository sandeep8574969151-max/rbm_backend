FROM php:8.0-apache

# Apache module fix
RUN a2dismod mpm_event && a2enmod mpm_prefork

# Apache ko foreground mein run karne ke liye zaroori
RUN rm -rf /var/run/apache2/*

# Files copy karein
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Apache ko foreground mein chalayein (Railway ke liye zaroori)
CMD ["apache2-foreground"]