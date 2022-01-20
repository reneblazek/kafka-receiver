ARG PHP_IMAGE_TAG=fpm-alpine3.12

FROM php:$PHP_IMAGE_TAG

ARG LIBRDKAFKA_VERSION=1.5.0
ARG EXT_RDKAFKA_VERSION=5.0.0
ARG INSTALL_COMPOSER=yes
ENV INSTALL_COMPOSER=$INSTALL_COMPOSER
ENV BUILD_DEPS 'autoconf git gcc g++ make bash openssh'

RUN apk --no-cache upgrade \
    && apk add $BUILD_DEPS

RUN git clone --depth 1 --branch v$LIBRDKAFKA_VERSION https://github.com/edenhill/librdkafka.git \
    && cd librdkafka \
    && ./configure \
    && make \
    && make install

COPY --from=composer /usr/bin/composer /usr/local/bin/

RUN pecl channel-update pecl.php.net \
    && pecl install rdkafka-$EXT_RDKAFKA_VERSION \
    && docker-php-ext-enable rdkafka \
    && rm -rf /librdkafka \
    && apk del $BUILD_DEPS

RUN docker-php-ext-install pdo_mysql

RUN echo 'alias sf="php bin/console"' >> ~/.bashrc