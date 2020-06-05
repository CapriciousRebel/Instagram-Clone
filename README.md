A clone of the Instagram website made for the purpose of learning the MVC architecture

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

(Make sure you have docker installed)

1. Add `127.0.0.1 instagram.rebel.local` entry in your `/etc/hosts` file
2. run `docker-compose up`
3. run `docker exec -it instagram-clone_db_1 bash` in another terminal
4. run `PGPASSWORD=password psql -h localhost -d instagram -U root < dump.sql` to populate the database and exit the terminal
5. open http://instagram.rebel.local:8000

