### A miniature customer relationship management system made with Laravel Sail.

##### Dependencies
* PHP 8.1
* MySql

##### To run the app execute commands from inside the app folder:
* ./vendor/bin/sail up
* ./vendor/bin/sail artisan migrate --seed
###### Faker fails to generate company logos due to image server failure. All other factories work as intended.

##### Do test with command:
* ./vendor/bin/sail artisan test

##### Site under address
* http://localhost

##### Mail service under address
* http://0.0.0.0:8025/

##### Build and run docker image with:
* COMPOSE_DOCKER_CLI_BUILD=1 DOCKER_BUILDKIT=1 ./vendor/bin/sail build
* docker-compose up
