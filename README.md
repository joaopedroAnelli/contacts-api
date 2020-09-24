# Contacts API

Contacts API is a simple REST API for teach our dev colleagues the concepts
of tests and its environment.

## System Reqs
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
## Install

1. Just clone this repo.
2. Up environment with docker-compose
    ```
    $ cd /path/to/contacts-api
    $ docker-compose up
    ```
3. Go inside of your php container
    ```
    $ docker exec -it contacts-api_web_1 /bin/bash
    ```
4. Install dependencies
    ```
    $ composer install
    ```

5. Clone .env.example to create your own .env file
    > Remeber to config the database correctly,
    > following docker-compose.yml file.

6. Run migrations
    ````
    $ php artisan migrate
   
**Conclusion**: After this steps, your API must be running on http://localhost:8080


## Running tests
````
$ docker exec -it contacts-api_web_1 /bin/bash
$ vendor/bin/phpunit tests
````
