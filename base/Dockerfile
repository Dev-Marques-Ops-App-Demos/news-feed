FROM php:5.6-apache

COPY php.ini-production /usr/local/etc/php/
COPY php.ini-development /usr/local/etc/php/

RUN apt update && \
    apt install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    freetds-common \
    freetds-bin \
    freetds-dev \
    unixodbc \
    git \
    vim

RUN ln -s /usr/lib/x86_64-linux-gnu/libsybdb.a /usr/lib/libsybdb.a && \
    ln -s /usr/lib/x86_64-linux-gnu/libsybdb.so /usr/lib/libsybdb.so

RUN docker-php-ext-install -j$(nproc) iconv mcrypt calendar && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-configure sybase_ct --with-sybase-ct=/usr  &&\
    docker-php-ext-install -j "$(nproc)" sybase_ct pdo_dblib

RUN docker-php-ext-install zip \
    pdo_mysql \
    mysqli && \
    apt-get install -y libxrender1 \
    fontconfig \
    libxext6 \
    libssl1.0-dev