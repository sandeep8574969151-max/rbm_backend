FROM php:8.0-apache

# Apache module conflict fix
RUN a2dismod mpm_event && a2enmod mpm_prefork

# Files ko root mein copy karein
COPY . /var/www/html/

# DocumentRoot ko root folder (/var/www/html) par hi rehne dein
# Isliye sed command hata di hai kyunki default config pehle se hi yahan point karti hai

# Permissions sahi karein
RUN chown -R www-data:www-data /var/www/html