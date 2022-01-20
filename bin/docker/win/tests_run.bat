@call %~dp0/_init.bat

docker-compose exec php ./bin/phpunit

@cd %start_path%
