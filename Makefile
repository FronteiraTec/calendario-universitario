install:
	docker-compose build
	docker-compose run uffs-calendar-php cp .env.example .env
	docker-compose run uffs-calendar-php composer install
	docker-compose run uffs-calendar-php php artisan key:generate
	docker-compose run uffs-calendar-php php artisan migrate
	docker-compose run uffs-calendar-php php artisan db:seed
	docker-compose run uffs-calendar-node yarn

run:
	docker-compose up

enter-php:
	docker exec -it uffs-calendar-php bash

enter-node:
	docker exec -it uffs-calendar-node bash

enter-database:
	docker exec -it uffs-calendar-database bash

enter-web:
	docker exec -it uffs-calendar-web bash