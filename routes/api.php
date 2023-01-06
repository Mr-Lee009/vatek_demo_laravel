<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\RoomController;
use \App\Http\Controllers\Api\HotelController;
use \App\Http\Controllers\AuthController;

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

//config by group 'middleware' => , 'check.apiKey','api'

Route::group(['prefix' => '/v1',
    'middleware' => ['verify.jwt'],
    'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::get("/hotels/", [HotelController::class, "index"]);

    Route::group(['prefix' => '/rooms'], function () {
        Route::get("/", [RoomController::class, "index"]);
        Route::post("/", [RoomController::class, "store"]);
        Route::get("/{room}", [RoomController::class, "show"]);
        Route::get("/find/{key}/{value}", [RoomController::class, "findBy"]);
        Route::put("/{room}", [RoomController::class, "update"]);
        Route::delete("/{room}", [RoomController::class, "destroy"]);
    });

    //Route::apiResource("/bookings", BookingController::class);
});

Route::group([
    'prefix' => '/auth',
    'middleware' => 'api',
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);
});
