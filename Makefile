.RECIPEPREFIX +=
.DEFAULT_GOAL := help
PROJECT_NAME=jump
include .env

help:
	@echo "Welcome to $(PROJECT_NAME) IT Support, have you tried turning it off and on again?"

install:
	@composer install

test:
	@docker exec $(PROJECT_NAME)_php ./vendor/bin/pest --parallel

coverage:
	@docker exec $(PROJECT_NAME)_php ./vendor/bin/pest --coverage

migrate:
	@docker exec $(PROJECT_NAME)_php php artisan migrate

migrate-fresh:
	@docker exec $(PROJECT_NAME)_php php artisan migrate:fresh

migrate-all:
	@docker exec $(PROJECT_NAME)_php php artisan migrate:fresh
	@docker exec $(PROJECT_NAME)_php php artisan tenants:migrate-fresh

seed:
	@docker exec $(PROJECT_NAME)_php php artisan db:seed

create-tenant:
	@docker exec $(PROJECT_NAME)_php php artisan tenant:create

analyse:
	@docker exec $(PROJECT_NAME)_php ./vendor/bin/phpstan analyse

generate:
	@docker exec $(PROJECT_NAME)_php php artisan ide-helper:models --write

nginx:
	@docker exec -it $(PROJECT_NAME)_nginx /bin/sh

php:
	@docker exec -it $(PROJECT_NAME)_php /bin/sh

mysql:
	@docker exec -it $(PROJECT_NAME)_mysql /bin/sh

redis:
	@docker exec -it $(PROJECT_NAME)_redis /bin/sh
