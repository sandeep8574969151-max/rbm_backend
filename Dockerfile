FROM php:8.1-apache
# Permissions set karein taaki Apache access kar sake
RUN chown -R www-data:www-data /var/www/html
COPY . /var/www/html/
# Index file priority set karein
RUN echo "DirectoryIndex index.php admin.php" >> /etc/apache2/apache2.conf