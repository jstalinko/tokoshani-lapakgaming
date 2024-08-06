<?php

use Illuminate\Support\Facades\Route;
use Jstalinko\TokoshaniLapakgaming\Http\Controllers\LapakgamingController;

Route::group(['prefix' => 'shn-api'], function () {
    Route::group(['prefix' => 'v2'] , function(){
        Route::get('/categories' ,[LapakgamingController::class , 'getCategory'])->name('tokoshani.lapakgaming.getcategories');
    });
});
