FROM php:7.2-apache
COPY /home/alumno/public_html/IAW/ /var/www/html/
RUN docker-php-ext-install mysqli
