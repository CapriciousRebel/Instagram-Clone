A clone of the Instagram website.

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

## Method 1 (Single command setup and go using docker):

1. Add `127.0.0.1 instagram.rebel.local` entry in your `/etc/hosts` file
2. run `docker-compose up`
3. open http://instagram.rebel.local


## Method 2:

1. run setup.sh : `chmod 500 setup.sh && ./setup.sh`
2. Make a postgresql database and apply the schema present in `app/models/schema.sql`
3. edit the `config/config.php` file and enter the database connection details
4. start a development server: `cd ../public && php -S localhost:8080`
5. open your browser and open http://localhost:8080
