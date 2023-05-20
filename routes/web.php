<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/updateprofile', function () {
    return view('updateprofile');
})->name('update.profile.page');

Route::get('/manage', function () {
     return view('manageapi');
})->middleware('auth')->name('manage.api.page');

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/authen',[LoginController::class,'authen'])->name('authen');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::view('/tes-update', 'updateprofile');