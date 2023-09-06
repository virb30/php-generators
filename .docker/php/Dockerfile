ARG USER_ID
ARG GROUP_ID

FROM php:8.1-fpm

WORKDIR /var/www/html

# install & enable xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# install dependencies
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    supervisor \
    libzip-dev \
    && apt-get clean -y \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install gd mbstring pcntl pdo

# configure locales
RUN sed -i -e 's/# pt_BR.UTF-8 UTF-8/pt_BR.UTF-8 UTF-8/' /etc/locale.gen \
    && locale-gen \
    && locale-gen pt_BR.UTF-8 \
    && dpkg-reconfigure  --frontend noninteractive locales

ENV LANG pt_BR.UTF-8
ENV LANGUAGE pt_BR.UTF-8
ENV LC_ALL pt_BR.UTF-8

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client \
    && docker-php-ext-install mysqli pdo_mysql




# set user
USER ${USER_ID}:${GROUP_ID}
