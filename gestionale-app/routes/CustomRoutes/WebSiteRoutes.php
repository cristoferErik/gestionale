<?php

use App\Http\Controllers\WebSiteController;
use Illuminate\Support\Facades\Route;

//Questa porqueria serve per essere utilizata per ottenere i dati dal postman
Route::get('webSiteToUpdateByMaintenance/{pag}',
[WebSiteController::class, 'webSiteToUpdateByMaintenance']);
Route::get('webSiteToUpdateByBackup/{pag}',
[WebSiteController::class,'webSiteToUpdateByBackup']);

