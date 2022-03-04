<?php

use App\Http\Controllers\Api\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JWTAuthController;

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

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);
Route::post('trips/available', [TripController::class, 'availableTrips']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('logout', [JWTAuthController::class, 'logout']);

});
