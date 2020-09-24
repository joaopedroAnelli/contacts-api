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


 > After this steps, your api must be running on http://localhost


## Running tests
````
$ docker exec -it contacts-api_web_1 /bin/bash
$ vendor/bin/phpunit tests
````
