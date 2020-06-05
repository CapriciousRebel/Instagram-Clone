FROM php:7.3-apache

# Install dependencies
RUN apt-get update
RUN apt-get remove libpq5
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql
RUN apt-get install zip unzip

# Setup the db
RUN chmod 500 ./init.sh 
RUN ./init.sh

# virtual hosts, apache and mod_rewrite
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

# copy the source code in the container
COPY . /app
RUN chown -R www-data:www-data /app 

# Change the workdir to /app
WORKDIR /app

# Get composer and install the dependencies
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer install
RUN composer dump-autoload
CMD ["start-apache"]

