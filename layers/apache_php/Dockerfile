FROM php:7.1-apache-stretch
ARG WEB_ROOT_PATH

# Composer
# We need git for using composer
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    git \
    zip \
    libpng-dev \
    libjpeg-dev \
    libicu-dev \
    zlib1g-dev \
    libmcrypt-dev \
    libxslt-dev \
    ldap-utils \
    libldb-dev \
    libfreetype6-dev \
    iputils-ping \
    unzip

RUN pecl install xdebug \ && docker-php-ext-enable xdebug

RUN docker-php-ext-install \
    sockets \
    mysqli \
    bcmath \
    gd \
    intl \
    mcrypt \
    opcache \
    pdo_mysql \
    soap \
    xsl \
    zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv /var/www/html/composer.phar /usr/local/bin/composer
RUN chmod +X /usr/local/bin/composer
RUN composer global require hirak/prestissimo

RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
    rm -rf /var/lib/apt/lists/*
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail

RUN a2enmod rewrite

RUN groupadd --gid 1000 docker
RUN useradd -u 1000 docker -g docker
RUN mkdir /home/docker
RUN chown -R 1000:1000 /home/docker
RUN chown -R 1000:1000 ${WEB_ROOT_PATH}
RUN usermod -a -G root docker
USER docker