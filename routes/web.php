<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('construction')->group(function () {
    Route::prefix('abstract-factory')->group(function () {

        // Car
        Route::get('electric-car/{model}/{standar}/{power}/{space}', 'AbstractFactoryController@electricCar');
        Route::get('gasoline-car/{model}/{standar}/{power}/{space}', 'AbstractFactoryController@gasolineCar');

        // Scooter
        Route::get('electric-scooter/{model}/{standar}/{power}', 'AbstractFactoryController@electricScooter');
        Route::get('gasoline-scooter/{model}/{standar}/{power}', 'AbstractFactoryController@gasolineScooter');
    });

    Route::prefix('factory')->group(function () {
        Route::get('discount-client/{quantity}', 'FactoryController@discountClient');
        Route::get('credit-client/{quantity}', 'FactoryController@creditClient');
    });
});
