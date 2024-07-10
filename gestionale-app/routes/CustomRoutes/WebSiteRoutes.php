<?php

use App\Http\Controllers\WebSiteController;
use Illuminate\Support\Facades\Route;

//Questa porqueria serve per essere utilizata per ottenere i dati dal postman
Route::get('webSiteByNextUpdate/{pag}',
[WebSiteController::class, 'getWebSiteByNextUpdate']);

