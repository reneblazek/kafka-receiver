#!/bin/bash
cd "$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )" ; cd .. ; cd .. ; cd ..

docker-compose exec php rm -rf var/*
docker-compose exec php mkdir -p var
docker-compose exec php mkdir -p var/log
docker-compose exec php mkdir -p var/cache

docker-compose exec php composer update

docker-compose exec php chmod -R 777 var
