#!/bin/bash
cd "$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )" ; cd .. ; cd .. ; cd ..

if [[ $EUID -ne 0 ]]; then
   echo "spusti prikaz: sudo $0"
   exit 1
fi

CONTAINER_ID=$(docker-compose ps -q php)

echo "kopirujem vendor"
docker cp $CONTAINER_ID:/var/www/html/vendor ./

echo "nastavujem prava pre vendor"
chown -R $USER:$USER vendor

echo "mazem editovane bundle z adresara ./vendor/goldmann/"
EDITED_VENDORS=$(docker-compose exec php ls /var/www/html/src/goldmann_composer_vendors)
for i in $EDITED_VENDORS; do
  rm -rf ./vendor/goldmann/$i
done;

