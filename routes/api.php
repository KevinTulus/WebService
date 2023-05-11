<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngkotController;

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

Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

Route::get('/angkot', [AngkotController::class, 'index']);
Route::get('/angkot/{id}', [AngkotController::class, 'checkRequest']);
// Route::get('/angkot/{nama_jalan}', [AngkotController::class, 'angkotTo']);
// Route::get('/angkot/{nama_jalan}', [AngkotController::class, 'angkotFrom']);


// Route::get('/rute', [AngkotController::class, 'index']);
// Route::get('/rute/{id}', [AngkotController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {

});
