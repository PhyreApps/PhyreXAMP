FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    icu-devtools \
    libgd-dev
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#Mine


# configuring php extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-external-gd
RUN docker-php-ext-configure intl

# Install extensions
RUN docker-php-ext-install bcmath calendar gd gmp intl mysqli pdo pdo_mysql mbstring zip exif pcntl
