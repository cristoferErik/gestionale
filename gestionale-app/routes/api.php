<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GrantServiceController;
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
        Route::apiResource('customers',CustomerController::class);
        //Ricorda che i controller dipendono complemtamente di questo nome
        //Quindi e vai a creare una istancia deve di essere seguendo il nome
        //serviceGrants
        Route::apiResource('serviceGrants',ServiceGrantController::class);
    }
);