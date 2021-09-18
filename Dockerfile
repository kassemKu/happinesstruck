FROM php:8.0-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
    	&& apk --no-cache add postgresql-dev nodejs yarn npm\
    	&& docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html/happinesstruck
RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client && docker-php-ext-install mcrypt pdo_mysql
ADD . /var/www/html/happinesstruck
RUN chown -R www-data:www-data /var/www/html/happinesstruck

RUN apk add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data

FROM postgres
RUN mkdir -p /var/lib/postgresql/data
RUN chmod -R 777 /var/lib/postresql/data
ENTRYPOINT docker-entrypoint.sh