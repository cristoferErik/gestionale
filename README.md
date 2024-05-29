se vuoi utilizzare questo repositorio, devi seguire i passi succesivi
######################################################################
Devi scrivere questo nel console
---------------------------------
sudo docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
######################################################################
finalmente aggiugnere
---------------------------------
sail artisan key:generate
######################################################################
