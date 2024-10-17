FROM php:8.3-fpm

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

# Set permissions & groups.
RUN groupadd --force -g ${GID} laravel
RUN useradd -ms /bin/bash --no-user-group -g ${UID} -u 1337 laravel

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

# Install Docker PHP extension install.
ADD --chmod=0755 "https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions" /usr/local/bin/

RUN apt-get update

RUN apt-get -y install --fix-missing \
    build-essential \
    git \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libzip-dev \
    libpq-dev \
    libbz2-dev \
    libmcrypt-dev \
    libicu-dev \
    libonig-dev

# Install required PHP extensions.
RUN install-php-extensions \
    curl \
    json \
    mbstring \
    pcre \
    simplexml \
    dom \
    openssl \
    pcntl \
    sockets \
    bcmath \
    intl \
    sodium \
    fileinfo \
    ctype \
    filter \
    hash \
    session \
    redis \
    tokenizer \
    gmp \
    ftp \
    zip \
    zlib \
    iconv \
    pdo_sqlite \
    sqlite3 \
    libxml \
    xml \
    xmlreader \
    xmlwriter \
    xsl \
    phar \
    exif \
    gd \
    pcov \
    xdebug

# Install and configure PGSQL extensions.
RUN install-php-extensions \
    pdo \
    pdo_pgsql \
    pgsql \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

WORKDIR /var/www/html

USER laravel
