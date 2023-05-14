<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngkotController;
use App\Http\Controllers\AuthController;

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

Route::post('/angkot/register', [AuthController::class, 'register']);
Route::post('/angkot/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/angkot', [AngkotController::class, 'allAngkot']);
    Route::get('/angkot/{no}', [AngkotController::class, 'oneAngkot']);
    Route::get('/angkot/lokasi/{nama_jalan}', [AngkotController::class, 'angkotTo']);
    Route::get('/angkot/lokasi/{nama_jalan1}/{nama_jalan2}', [AngkotController::class, 'angkotBetween']);
    Route::post('/angkot/logout', [AuthController::class, 'logout']);
});
