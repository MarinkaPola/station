<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\AuthController;


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



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;


Route::group(['middleware' => ['auth:sanctum']], function () {
Route::apiResource('user', UserController::class);
Route::apiResource('station', StationController::class);
Route::get('open-stations', [StationController::class, 'open_stantions']);
});

Route::fallback( [AuthController::class, 'fallback']);
