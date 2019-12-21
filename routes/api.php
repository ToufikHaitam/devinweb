<?php

use App\City;
use App\Http\Controllers\Api\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('city/{city}/delivery-times', 'Api\CityController@attacheCityToDeliveryTime');
Route::apiResource('city', 'Api\CityController');
Route::apiResource('delivery-times', 'Api\DeliveryTimeController');
Route::get('delivery_times/exclude','Api\DeliveryTimeController@excludetimestodate');
Route::get('delivery_date/exclude/{id}','Api\DeliveryTimeController@excludeAllDeliveryTimesDate');
Route::post('city/{city}/delivery-dates-times/{number}', 'Api\CityController@deliveryDates');
