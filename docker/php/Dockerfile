FROM php:8.1-fpm-buster
MAINTAINER Josef Banya <josef@banya.cz>

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update  -y  \
    && apt-get install -y \
    git \
    git-core \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	supervisor \
	zip \
    libxml2-dev \
    zlib1g-dev \
    libicu-dev \
    libzip-dev \
    g++

RUN apt-get clean -y

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd intl

RUN docker-php-ext-install -j$(nproc) mbstring bcmath mysqli shmop zip

COPY ./docker/php/entry.sh /

RUN chmod +x /entry.sh

ENTRYPOINT /entry.sh
