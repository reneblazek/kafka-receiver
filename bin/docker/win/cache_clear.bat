@call %~dp0/_init.bat

docker-compose exec php ./bin/console cache:clear

docker-compose exec php mkdir -p var
docker-compose exec php mkdir -p var/log
docker-compose exec php mkdir -p var/cache
docker-compose exec php chmod -R 777 var

@cd %start_path%
