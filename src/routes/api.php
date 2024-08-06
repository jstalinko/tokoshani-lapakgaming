<?php

use Illuminate\Support\Facades\Route;
use Jstalinko\TokoshaniLapakgaming\Http\Controllers\VipresellerController;

Route::group(['prefix' => 'shn-api'], function () {
    Route::group(['prefix' => 'v2'] , function(){
        Route::get('/categories' ,[] );
    });
});
