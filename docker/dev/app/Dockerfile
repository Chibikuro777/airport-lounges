FROM node:14.2-alpine as node
FROM nginx:1.18-alpine as nginx
FROM php:8.0.3-fpm-alpine
SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

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

RUN apk update && apk upgrade
RUN apk add --no-cache git icu-dev libzip-dev libpng-dev zip unzip supervisor
RUN mkdir /var/run/php-fpm
RUN mkdir /var/log/nginx /var/cache/nginx
RUN git clone -b 5.3.3 https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis
RUN docker-php-ext-install intl pdo_mysql zip bcmath gd redis
RUN composer config -g process-timeout 3600
RUN composer config -g repos.packagist composer https://packagist.org

COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /opt /opt

COPY --from=nginx /etc/nginx /etc/nginx
COPY --from=nginx /usr/lib /usr/lib
COPY --from=nginx /usr/sbin /usr/sbin

COPY ./app/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./app/php/php.ini /usr/local/etc/php/php.ini
COPY ./app/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./app/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./app/supervisor/app.ini /etc/supervisor.d/app.ini

WORKDIR /var/www/app

EXPOSE 80

CMD ["/usr/bin/supervisord","-n"]
