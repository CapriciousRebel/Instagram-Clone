# Instagram
A clone of Instagram website, as an exercise to study the MVC Architecture

# Tech stack
### Architecture:
- MVC
### Front-end:
- html, css, javascript
- Twig for templating
### Back-end:
- PHP
- ToroPHP, composer
### Database:
- PostgreSQL

---

# Setup :

## Method 1:

1) clone the repo and `cd` into it
2) give permission to run setup.sh : `chmod 777 setup.sh`
3) run setup.sh: `./setup.sh`

## Method 2:

1) clone the repo and `cd` into it
2) setup composer:
- `curl -s https://getcomposer.org/installer | php`
- `sudo mv composer.phar /usr/local/bin/composer`
3) install dependencies  `composer install`
4) dump autoload `composer dump-autoload`
5) setup database connection :
- `cd config`
- `touch config.php`
- edit config.php and add the details of your database connection in the following format:
    ```
    <?php
    $username = 'postgres';
    $password = '<- your password ->';
    $host = 'localhost';
    $dbname = '<- your database name ->';
    ```
- use schema.sql to create a database



  
   
