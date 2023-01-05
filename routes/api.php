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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/createAPI', [\App\Http\Controllers\HomeController::class, 'createAPI']);

//config by group
Route::group([
    'prefix' => '/v1',
    'namespace' => 'App\Http\Controllers\Api',

], function () {
    Route::apiResource("/hotels", \App\Http\Controllers\Api\HotelController::class);
    //Route::apiResource("/rooms", RoomController::class);
    //Route::apiResource("/bookings", BookingController::class);
});
