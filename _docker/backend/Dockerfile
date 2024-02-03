FROM php:8.2-fpm

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# Redis PHP Extension
RUN pecl install redis && docker-php-ext-enable redis

ARG UID
ARG GID

RUN groupadd -g ${GID} laravel
RUN useradd -u ${UID} -g ${GID} -s /bin/bash -m laravel

RUN chown -R laravel:laravel /var/www


EXPOSE 9000
CMD ["php-fpm"]
