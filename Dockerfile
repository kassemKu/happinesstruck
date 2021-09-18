FROM sail-8.0

WORKDIR /var/www
RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client && docker-php-ext-install mcrypt pdo_mysql
ADD . /var/www
RUN chown -R www-data:www-data /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
    	&& apk --no-cache add postgresql-dev nodejs yarn npm\
    	&& docker-php-ext-install pdo pdo_pgsql


RUN apk add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data

FROM postgres
RUN mkdir -p /var/lib/postgresql/data
RUN chmod -R 777 /var/lib/postresql/data
ENTRYPOINT docker-entrypoint.sh
