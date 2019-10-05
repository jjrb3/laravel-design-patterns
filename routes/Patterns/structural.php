<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('construction')->group(function () {

    // Abstract Factory pattern
    Route::prefix('abstract-factory')->group(function () {

        // Car
        Route::get(
            'electric-car/{model}/{standar}/{power}/{space}',
            'Creational\AbstractFactoryController@electricCar'
        )->name('electricCar');

        Route::get(
            'gasoline-car/{model}/{standar}/{power}/{space}',
            'Creational\AbstractFactoryController@gasolineCar'
        )->name('gasolineCar');


        // Scooter
        Route::get(
            'electric-scooter/{model}/{standar}/{power}',
            'Creational\AbstractFactoryController@electricScooter'
        )->name('electricScooter');

        Route::get(
            'gasoline-scooter/{model}/{standar}/{power}',
            'Creational\AbstractFactoryController@gasolineScooter'
        )->name('gasolineScooter');
    });

    // Factory pattern
    Route::prefix('factory')->group(function () {

        Route::get(
            'discount-client/{quantity}',
            'Creational\FactoryController@discountClient'
        )->name('discountClient');

        Route::get(
            'credit-client/{quantity}',
            'Creational\FactoryController@creditClient'
        )->name('creditClient');
    });

    // Builder pattern
    Route::prefix('builder')->group(function () {

        Route::get(
            'documentation-vehicle/{type}/{name}/{email}',
            'Creational\BuilderController@getDocumentation'
        )->name('documentationVehicle');
    });

    // Prototype pattern
    Route::prefix('prototype')->group(function () {

        Route::get(
            'books',
            'Creational\PrototypeController@getBooks'
        )->name('books');
    });

    // Singleton pattern
    Route::prefix('singleton')->group(function () {

        Route::get(
            'white-document',
            'Creational\SingletonController@getWhiteDocument'
        )->name('whiteDocument');
    });
});
