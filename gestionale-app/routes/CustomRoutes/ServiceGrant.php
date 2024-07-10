<?php

use App\Http\Controllers\ServiceGrantController;
use Illuminate\Support\Facades\Route;

//Questa porqueria serve per essere utilizata per ottenere i dati dal postman
Route::get('serviceGrantByCustomer/{pag}/{id}',
[ServiceGrantController::class, 'getServiceGrantByCustomer']);
