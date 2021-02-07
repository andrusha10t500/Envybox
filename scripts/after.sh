#!/bin/bash

docker-compose exec -T backend php artisan key:generate
docker-compose exec -T backend php artisan migrate
docker-compose exec -T backend composer install
docker-compose exec -T backend npm install
docker-compose exec -T backend npm run dev
