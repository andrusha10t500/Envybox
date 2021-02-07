FROM php:7.2-fpm

WORKDIR /var/www/laravel

RUN apt-get update \
    && apt-get install -y \
        git \
        zip \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo pdo_mysql \
    && docker-php-ext-install -j$(nproc) gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#install nvm
RUN wget -qO- https://raw.githubusercontent.com/creationix/nvm/v0.33.8/install.sh | bash
RUN source ~/.profile

COPY . .

RUN composer install
#RUN npm install

# Add user for laravel application
RUN groupadd -g 1001 www
RUN useradd -u 1001 -ms /bin/bash -g www www
USER www
CMD ["npm", "run", "dev"]
CMD ["php-fpm"]
