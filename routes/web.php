<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard.page');

Route::get('/updateprofile', function () {
    return view('updateprofile');
})->name('update.profile.page');

Route::get('/manage', function () {
    return view('manageapi');
})->name('manage.api.page');


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/authen',[LoginController::class,'authen'])->name('authen');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');