install:
	U_ID=$$(id -u) G_ID=$$(id -g) docker-compose build
	docker-compose run ucalendar-php cp .env.example .env
	docker-compose run ucalendar-php composer install
	docker-compose run ucalendar-php php artisan key:generate
	docker-compose run ucalendar-php php artisan migrate:refresh --seed
	docker-compose run ucalendar-node yarn

run:
	docker-compose up

enter-php:
	docker exec -it ucalendar-php bash

enter-node:
	docker exec -it ucalendar-node bash

enter-database:
	docker exec -it ucalendar-database bash

enter-web:
	docker exec -it ucalendar-web bash