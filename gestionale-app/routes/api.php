<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GrantServiceController;
use App\Models\GrantService;
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
        Route::apiResource('services',GrantServiceController::class);
    }
);