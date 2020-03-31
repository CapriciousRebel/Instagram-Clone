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

- use schema.sql to create the database

## Method 1:

1) clone the repo and `cd` into it
2) give permission to run setup.sh : `chmod 777 setup.sh`
3) run setup.sh: `./setup.sh`
4) `cd config`
5)  edit the config.php file and enter the database connection details
6) cd into public folder: `cd ../public`
7) start a development server: `php -S localhost:8080`
8) open your browser and open http://localhost:8080

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
    $password = '';
    $host = 'localhost';
    $dbname = '';
    ```
6) cd into public folder: `cd ../public`
7) start a development server: `php -S localhost:8080`
8) open your browser and open http://localhost:8080



  
   
