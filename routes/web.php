<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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
//auth agar halaman hanya bisa diakses oleh user yang berhasil login
//guest agar halaman hanya bisa diakses oleh user level 'guest'
Route::get('/', function () {
    return view('welcome');
})->middleware('auth','verified','auth.session');

Route::middleware(['guest'])->group(function(){
    //login
    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/authen',[LoginController::class,'authen'])->name('authen');
    //register
    Route::get('/register',[RegisterController::class,'regis'])->name('register');
    Route::post('/proses',[RegisterController::class,'proses'])->name('proses');

});
//Untuk mengirim email konfirmasi
Route::get('email/verify',[RegisterController::class,'emailverif'])->name('verification.notice')->middleware('auth');
//Untuk mengirim 
Route::get('/email/verify/{id}/{hash}',[RegisterController::class,'verif'])->name('verification.verify')->middleware('auth','signed');
//Untuk mengirim ulang email konfirmasi
Route::post('/email/verification-notification',[RegisterController::class,'sendEmail'])->name('verification.send')->middleware('auth','throttle:6,1');

//Untuk logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
