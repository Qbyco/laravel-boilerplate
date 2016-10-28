## Web bolerplate
##### version: 1.0.0
---
#### Requirements
* Docker and docker compose to be installed

#### What's inside?
- Two docker machines (webserver and mariaDB)
- Apache server
- PHP 5.6 with everything ready to go

#### Installation
- Clone this repo
- Alter default db credentials from docker-composer.yml
- Delete ``` .git ``` folder or move origin to upstream if you want to remain linked with us :) like so:
    - ``` git remote add upstream git@github.com:metacatdud/laravel-boilerplate.git ``` to put bolierplate branch in upstream
    - ```git remote set-url origin https://URL/to/yourproject.git```
    - Check it by running ``` git remote -v```
- Enter web server docker machine. You will be redirected to the project root.
    - Run ``` composer update ``` to update your laravel copy and start fresh
    - Give write permissions on ``` storage/ ``` and ``` bootstrap/cache/ ``` folders
- From your ```host``` give write permissions to any folder you might need to edit from here but was created by the docker machine such as migration file or a model file.
- Link the project to your git repository.


### Working
- Your working folder from host computer will be webapp
- Use the compser from the webs server docker

### Running and Accessing
* To run you dockers go to project root and run ``` docker-compose up``` to run in service mode and see data dump from any of the machines or ```docker-compose up -d``` to run as daemon
* To find your docker machines names run ```docker-compose ps ```. You will se a list with two docker machines
* To access a machine run ``` docker exec -ti [name_of_the_machine] bash ```
* [NOTE]
    * If you run in daemon mode and you want to see the logs just run ``` docker-compose logs ``` or ``` docker-compose logs -f ``` for log tail mode

##### Goodies pack
* Countries DB and Seed. Remove these if you don't need them