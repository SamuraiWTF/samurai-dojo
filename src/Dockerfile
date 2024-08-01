FROM php:7.4.27-apache-bullseye

RUN docker-php-ext-install pdo_mysql mysqli

RUN apt-get update && apt-get install -y dnsutils

ENV DOJO_DB_TYPE=mysql