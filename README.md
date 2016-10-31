## Web boilerplate
##### version: 1.1.0
---
#### Requirements
* Docker and docker compose to be installed

#### What's inside?
- Two docker machines (webserver and mariaDB)
- Apache server
- PHP 5.6 with everything ready to go (For more info take a peek inside docker/builds/php-apache/Dockerfile)

#### Installation
- Clone this repo
- (Optional Step) Rename ```docker-compose.override.yml.example``` to ```docker-compose.override.yml```. If you choose not to use overwrite a setup with default docker-compose.yml contents will be created
- Alter default db credentials from ```docker-composer.yml``` with your ```docker-compose.override.yml```. You need to preserve keys tree!
- Delete ``` .git ``` folder or move origin to upstream if you want to remain linked with us :) like so:
    - ``` git remote add upstream git@github.com:Qbyco/laravel-boilerplate.git ``` to put bolierplate branch in upstream
    - ``` git remote set-url origin https://URL/to/yourproject.git```
    - Check it by running ``` git remote -v```
- Enter web server docker machine. You will be redirected to the project root.
    - Run ``` composer update ``` to update your laravel copy and start fresh.
    - Give write permissions on ``` storage/ ``` and ``` bootstrap/cache/ ``` folders
    - NOTE! - A default update will be done for you
- From your ```host``` give write permissions to any folder you might need to edit from here but was created by the docker machine such as migration file or a model file.
- Link the project to your git repository:
    - ``` git init ```
    - ``` git remote add origin https://URL/to/yourproject.git ``` (this applies for the case you delete .git folder entirely)

### Running and Accessing
* To run you dockers go to project root and run ``` docker-compose up``` to run in service mode and see data dump from any of the machines or ```docker-compose up -d``` to run as daemon
* To find your docker machines names run ```docker-compose ps ```. You will se a list with two docker machines
* To access a machine run ``` docker exec -ti [machine_name] bash ```
* [NOTE]
    * If you run in daemon mode and you want to see the logs just run ``` docker-compose logs ``` or ``` docker-compose logs -f ``` for log tail mode

### Working
- Your working folder from host computer will be webapp
- Copy your db credentials from ```docker-compose.yml``` or ``` docker-compose.override.yml``` to ```webapp/.env``` file. If you can't do this grant write permissions from you host.
- Use the composer cli from within the webserver docker machine
- Run ``` php artisan key:generate ``` from withn webserver docker before anything else.

#### Goodies pack
* Countries DB and Seed. Remove these if you don't need them

#### References
- https://www.docker.com
- https://docs.docker.com/compose
- https://getcomposer.org
- https://laravel.com

#### License
Released under MIT license.

##### Credits
qbyco.com