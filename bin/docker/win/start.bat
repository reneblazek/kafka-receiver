@call %~dp0/_init.bat

docker-compose pull
docker-compose up -d

@cd %start_path%
