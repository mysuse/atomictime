FROM php:7.4-apache

#COPY confg file
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
