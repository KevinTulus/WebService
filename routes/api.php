<?php

use App\Http\Controllers\AngkotController;
use Illuminate\Support\Facades\Route;

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
Route::get('/angkot/{id}', [AngkotController::class, 'show']);
Route::get('/rute', [AngkotController::class, 'index']);
Route::get('/rute/{id}', [AngkotController::class, 'show']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
