up:
	docker compose up -d

instalar_deps:
	docker compose exec -T php bash -c "composer install"

migrar_banco:
	docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:update --force"

fixtures:
	docker compose exec -T php bash -c "php bin/fixtures.php"	
	docker compose exec -T php bash -c "php bin/userFixtures.php"	

reset_banco:
	docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:drop --force"
	docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:create"
	docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:update --force"

container_php:
	docker compose exec -it php bash

container_mysql:
	docker compose exec -it mysql bash

setup: up instalar_deps migrar_banco fixtures


