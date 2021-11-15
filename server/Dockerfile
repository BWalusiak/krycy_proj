FROM php:7.2-apache-stretch

RUN apt update && apt install -y iputils-ping netcat wget

COPY external-service/ /var/www/html/external
COPY interal-schedule-app /var/www/html/internal

COPY vhost-internal.conf /etc/apache2/sites-enabled
COPY vhost-external.conf /etc/apache2/sites-enabled

RUN chown www-data:www-data -R /var/www/html

EXPOSE 80
EXPOSE 8080
