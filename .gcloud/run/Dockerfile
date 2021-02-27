FROM composer:2 as builder

WORKDIR /app

COPY composer.json composer.lock /app/

RUN composer install --no-scripts --no-autoloader && \
    composer dump-autoload --no-scripts --optimize --classmap-authoritative --no-dev --ignore-platform-reqs

FROM shin1x1/php-dev:8.0-apache-buster

ENV PORT 8080
ENV PHP_INI_DIR /usr/local/etc/php

WORKDIR /var/www/html
COPY .gcloud/run/httpd.conf /etc/apache2/sites-available/run.conf
COPY docker/php.ini-production $PHP_INI_DIR/php.ini
COPY --from=builder /app/vendor /var/www/html/vendor
COPY . ./

RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

RUN a2enmod rewrite && \
    a2dissite 000-default && \
    a2ensite run

RUN php /var/www/html/bin/console cache:clear --no-warmup && \
    php /var/www/html/bin/console cache:warmup

CMD ["apache2-foreground"]
