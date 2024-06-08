<?php

use App\Http\Controllers\HomeController\HomeController;
use Illuminate\Support\Facades\Route;

//Questa porqueria serve per essere utilizata per ottenere i dati dal postman
Route::get('ServicesUpdateByCustomer/{pag}',
[HomeController::class, 'getServicesUpdateByCustomer']);

