@call %~dp0/_init.bat

docker-compose exec php rm -rf vendor/*
docker-compose exec php rm -rf var/*

docker-compose exec php mkdir -p var
docker-compose exec php mkdir -p var/log
docker-compose exec php mkdir -p var/cache
docker-compose exec php chmod -R 777 var


docker-compose exec php composer install --no-scripts
docker-compose exec php composer update --no-scripts
docker-compose exec php composer update

@cd %start_path%
