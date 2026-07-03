FROM php:8.1-apache

# mysqli extension install karein
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Permissions aur files copy karein
RUN chown -R www-data:www-data /var/www/html
COPY . /var/www/html/

# Index priority
RUN echo "DirectoryIndex index.php admin.php" >> /etc/apache2/apache2.conf