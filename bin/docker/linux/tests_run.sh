#!/bin/bash
cd "$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )" ; cd .. ; cd .. ; cd ..

docker-compose exec php ./bin/phpunit
