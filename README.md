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

## Simplest method:

1. add `127.0.0.1 instagram.rebel.local` in your `/etc/hosts` file
2. restart apache :`sudo apachectl restart`
3. stop apache :`sudo apachectl stop`
4. run `docker-compose build`
5. run `docker-compose up`
6. open http://instagram.rebel.local

## Method 1:

1. clone the repo and `cd` into it
2. give permission to run setup.sh : `chmod 500 setup.sh`
3. run setup.sh: `./setup.sh`
4. `cd config`
5. edit the config.php file and enter the database connection details
6. cd into public folder: `cd ../public`
7. start a development server: `php -S localhost:8080`
8. open your browser and open http://localhost:8080