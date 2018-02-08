FROM richarvey/nginx-php-fpm:latest

RUN apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS linux-headers && \
    pecl install swoole && \
    docker-php-ext-enable swoole && \
    apk del .phpize-deps

RUN curl -fSL https://phar.phpunit.de/phpunit-6.5.phar -o phpunit-6.5.phar \
    && chmod +x phpunit-6.5.phar \
    && mv phpunit-6.5.phar /usr/local/bin/phpunit \
    && phpunit --version

CMD ["/start.sh"]