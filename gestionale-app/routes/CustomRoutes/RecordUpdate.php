<?php

use App\Http\Controllers\RecordUpdateController;
use Illuminate\Support\Facades\Route;

//Questa porqueria serve per essere utilizata per ottenere i dati dal postman
Route::post('createRecordUpdate',
[RecordUpdateController::class, 'createRecordUpdate']);
