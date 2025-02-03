setup:
	@make docker-up-build
	@make composer-install
	@make set-permissions
	@make setup-env
	@make generate-key
	@make migrate-fresh-seed

docker-up:
	docker compose up -d

docker-down:
	docker compose down

docker-up-build:
	docker compose up -d --build

composer-install:
	docker exec creaify-app bash -c "composer install"

composer-update:
	docker exec creaify-app bash -c "composer update"

set-permissions:
	docker exec creaify-app bash -c "chmod -R 775 /var/www/storage"
	docker exec creaify-app bash -c "chmod -R 775 /var/www/bootstrap"

setup-env:
	docker exec creaify-app bash -c "cp .env.docker .env"

generate-key:
	docker exec creaify-app bash -c "php artisan key:generate"

migrate-fresh-seed:
	docker exec creaify-app bash -c "php artisan migrate:fresh --seed"
