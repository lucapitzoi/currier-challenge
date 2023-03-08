<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// API V1 Routes
Route::group(['prefix' => '/v1'], function () {

    // API Routes
    Route::group(['prefix' => '/currier'], function () {

        // Shipments API
        Route::group(['prefix' => '/shipments'], function () {
            Route::get('/', 'Api\ShipmentsController@index')->name('api.v1.currier.shipments');
            Route::get('/dhl', 'Api\ShipmentsController@dhl')->name('api.v1.currier.shipments.dhl');
            Route::get('/brt', 'Api\ShipmentsController@brt')->name('api.v1.currier.shipments.brt');
        });

    });

});
