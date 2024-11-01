# Variáveis
APP_CONTAINER=app
LARAVEL_CONTAINER=laravel_app
POSTGRES_CONTAINER=postgres

# Comandos principais
.PHONY: build up down restart logs bash composer artisan test seed

# Construir as imagens do Docker e rodar composer install e key:generate
build:
	docker-compose build
	docker-compose up -d
	docker-compose exec $(APP_CONTAINER) cp .env.example .env
	docker-compose exec $(APP_CONTAINER) composer install
	docker-compose exec $(APP_CONTAINER) php artisan key:generate
	docker-compose exec $(APP_CONTAINER) php artisan migrate --seed
	docker-compose down

# Subir os containers do Docker
up:
	docker-compose up -d

# Derrubar os containers do Docker
down:
	docker-compose down

# Reiniciar os containers do Docker
restart:
	docker-compose down && docker-compose up -d

# Ver logs do container da aplicação
logs:
	docker-compose logs -f $(APP_CONTAINER)

# Acessar o bash do container da aplicação
bash:
	docker exec -it $(LARAVEL_CONTAINER) /bin/bash

# Executar o Composer no container da aplicação
composer:
	docker exec -it $(LARAVEL_CONTAINER) composer install

# Executar comandos Artisan
artisan:
	docker exec -it $(LARAVEL_CONTAINER) php artisan $(cmd)

# Executar testes
test:
	docker exec -it $(LARAVEL_CONTAINER) php artisan test

# Executar migrate
migrate:
	docker exec -it $(LARAVEL_CONTAINER) php artisan migrate --seed

# Executar migrate refresh
refresh:
	docker exec -it $(LARAVEL_CONTAINER) php artisan migrate:refresh --seed
