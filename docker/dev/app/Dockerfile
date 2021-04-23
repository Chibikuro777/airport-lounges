FROM node:14.2-alpine as node
# FROM nginx:1.18-alpine as nginx
FROM php:8.0.3-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
  apt-get install -y supervisor && \
  apt-get install -y nginx && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev libpng-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  mkdir /var/run/php-fpm && \
  git clone -b 5.3.3 https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
  docker-php-ext-install intl pdo_mysql zip bcmath gd redis && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.org

COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /opt /opt

# COPY --from=nginx /etc/nginx /etc/nginx
# COPY --from=nginx /usr/sbin /usr/sbin

COPY ./app/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./app/php/php.ini /usr/local/etc/php/php.ini
COPY ./app/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./app/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./app/supervisor/app.conf /etc/supervisor/conf.d/app.conf

WORKDIR /var/www/app

EXPOSE 80

CMD ["/usr/bin/supervisord"]
