FROM php:8-fpm

# composer.lock ve composer.json dosyalarını kopyala
COPY composer.lock composer.json /var/www/

# Çalışma dizini ayarla
WORKDIR /var/www

# Bağımlılıkları yükle
RUN apt-get update && apt-get install -y \
    build-essential \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# GD uzantısını yükle
RUN apt-get install -y libgd-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd

# Diğer uzantıları yükle
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Composer'ı yükle
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravel uygulaması için kullanıcı ekle
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Mevcut uygulama dizini içeriğini kopyala
COPY . /var/www

# Mevcut uygulama dizini izinlerini kopyala
COPY --chown=www:www . /var/www

# Geçerli kullanıcıyı www olarak değiştir
USER www

# Port 9000'i aç ve php-fpm sunucusunu başlat
EXPOSE 9000
CMD ["php-fpm"]
