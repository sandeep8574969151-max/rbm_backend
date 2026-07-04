FROM php:8.0-apache

# 1. Sabse pehle modules ko systematically handle karein
RUN a2dismod mpm_event mpm_worker && \
    a2enmod mpm_prefork

# 2. Files copy karein
COPY . /var/www/html/

# 3. Permissions set karein
RUN chown -R www-data:www-data /var/www/html

# 4. ServerName warning hataayein
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 5. Apache ko foreground mein chalayein
CMD ["apache2-foreground"]