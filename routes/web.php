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
        Route::get('electric-car/{model}/{standar}/{power}/{space}', 'Creational\AbstractFactoryController@electricCar');
        Route::get('gasoline-car/{model}/{standar}/{power}/{space}', 'Creational\AbstractFactoryController@gasolineCar');

        // Scooter
        Route::get('electric-scooter/{model}/{standar}/{power}', 'Creational\AbstractFactoryController@electricScooter');
        Route::get('gasoline-scooter/{model}/{standar}/{power}', 'Creational\AbstractFactoryController@gasolineScooter');
    });

    Route::prefix('factory')->group(function () {
        Route::get('discount-client/{quantity}', 'Creational\FactoryController@discountClient');
        Route::get('credit-client/{quantity}', 'Creational\FactoryController@creditClient');
    });

    Route::prefix('builder')->group(function () {
        Route::get('documentation-vehicle/{type}/{name}/{email}', 'Creational\BuilderController@getDocumentation');
    });

    Route::prefix('prototype')->group(function () {
        Route::get('books', 'Creational\PrototypeController@getBooks');
    });

    Route::prefix('singleton')->group(function () {
        Route::get('white-document', 'Creational\SingletonController@getWhiteDocument');
    });
});
