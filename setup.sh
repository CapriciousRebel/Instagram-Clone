#!/usr/bin/env bash

curl -s https://getcomposer.org/installer | php

sudo mv composer.phar /usr/local/bin/composer
composer install
composer dump-autoload

cd config

touch config.php
echo "<?php $username = 'postgres'; $password = '<- your password ->'; $host = 'localhost'; $dbname = '<- your database name ->';" > config.php
