#!/usr/bin/env bash

curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer install
composer dump-autoload
