<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceGrantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::group(
    [
        'prefix'=>'v1',
        'namespace'=>'App\Http\Controllers'
    ],function(){
        //Ricorda che i controller dipendono complemtamente di questo nome
        //Quindi e vai a creare una istancia deve di essere seguendo il nome
        //customers
        Route::apiResource('customers',CustomerController::class);
        Route::apiResource('serviceGrants',ServiceGrantController::class);

        include __DIR__ . '/CustomRoutes/HomeRoutes.php';
    }
);