FROM php:7.4-fpm

ENV TZ=UTC \
    LANG=en_US.UTF-8 \
    LANGUAGE=en_US.en \
    LC_ALL=en_US.UTF-8 \
    PATH=/composer/vendor/bin:$PATH

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN set -x \
 && apt update \
 && apt upgrade -y \
 && apt install -y --no-install-recommends git zip unzip libicu-dev libonig-dev libzip-dev locales libpq-dev \
 && apt clean \
 && rm -rf /var/cache/apt \
 && locale-gen en_US.UTF-8 \
 && localedef -f UTF-8 -i en_US en_US.UTF-8 \
 && docker-php-ext-install pdo_pgsql intl zip bcmath \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && curl -sL https://deb.nodesource.com/setup_12.x | bash - \
 && apt install -y nodejs \
 && usermod -s /bin/bash www-data \
 && chown -R www-data:www-data /var/www

COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./20-xdebug.ini /usr/local/etc/php/conf.d/20-xdebug.ini

USER www-data

WORKDIR /var/www/html