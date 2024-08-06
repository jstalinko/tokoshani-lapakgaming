<?php

use Illuminate\Support\Facades\Route;
use Jstalinko\TokoshaniLapakgaming\Http\Controllers\LapakgamingController;

Route::group(['prefix' => 'shn-api'], function () {
    Route::group(['prefix' => 'v2'] , function(){
        Route::get('/categories' ,[LapakgamingController::class , 'getCategory'])->name('tokoshani.lapakgaming.getcategories');
        Route::get('/all-products',[LapakgamingController::class , 'getProducts'])->name('tokoshani.lapakgaming.getallproducts');
        Route::get('/product-category/{category_code}' , [LapakgamingController::class , 'getProduct'])->name('tokoshani.lapakgaming.getproductbycategory');
        Route::get('/product/{product_code}' , [LapakgamingController::class , 'getProduct'])->name('tokoshani.lapakgaming.getproductbycode');
        Route::get('/order-status/{txid}' , [LapakgamingController::class , 'orderStatus'])->name('tokoshani.lapakgaming.orderstatus');

    });
});
