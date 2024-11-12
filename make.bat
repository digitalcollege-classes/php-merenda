REM Arquivo de automatização de comandos direcionado para usuários Windows
REM Como usar:
REM Execute um terminal CMD - Prompt de Comando (não utilizar powershell)
REM Para usar execute o comando >>> make : nome_do_comando
REM Exemplo >>> make : setup

@echo off

:up
docker compose up -d
goto :eof

:instalar_deps
docker compose exec -T php bash -c "composer install"
goto :eof

:migrar_banco
docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:update --force"
goto :eof

:fixtures
docker compose exec -T php bash -c "php bin/fixtures.php"
docker compose exec -T php bash -c "php bin/userFixtures.php"
goto :eof

:reset_banco
docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:drop --force"
docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:create"
docker compose exec -T php bash -c "php bin/doctrine orm:schema-tool:update --force"
goto :eof

:container_php
docker compose exec -it php bash
goto :eof

:container_mysql
docker compose exec -it mysql bash
goto :eof

:setup
call :up
call :instalar_deps
call :migrar_banco
call :fixtures
goto :eof
