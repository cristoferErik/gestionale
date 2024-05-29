se vuoi utilizzare questo repositorio, devi seguire i passi succesivi
######################################################################
Installiamo composer in nostra app
docker run --rm --interactive --tty -v $(pwd):/app composer install
######################################################################
finalmente aggiugnere
---------------------------------
sail artisan key:generate
######################################################################
e creare un file .env e coppiare tutti i dati di .envExample.
Cambiare root per altro nome, cosi potraì collegharti al database
