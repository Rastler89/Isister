<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('renew', [PassportAuthController::class, 'refresh']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);
    Route::get('my-pets', [App\Http\Controllers\PetController::class, 'indexApi']);
});

Route::middleware('checkAccessToken')->get('/user', function () {
    echo "hola";
});

Route::get('species/{id}/races',[App\Http\Controllers\RaceController::class, 'getAllBySpecie']);
Route::get('pet/{id}/vaccines', [App\Http\Controllers\VaccineControll::class, 'getAllByPet']);

