<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\TokenController;
use App\Http\Controllers\user\UserProfileController;


use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\DeskripsiController;
use App\Http\Controllers\admin\JalanController;
use App\Http\Controllers\admin\LokasiController;
use App\Http\Controllers\admin\RuteController;
use App\Http\Controllers\admin\AngkutanKotaController;

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

// -------------------------------------- login, register, email verification Routes -----------------------------------------

//auth agar halaman hanya bisa diakses oleh user yang berhasil login
//guest agar halaman hanya bisa diakses oleh user level 'guest'
Route::get('/', function () {
    if (auth()->user()->is_admin == 1) {
        return redirect()->route('angkot.index');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth','verified','auth.session');

Route::middleware('guest')->group(function(){
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

// -------------------------------------------- User Routes -------------------------------------------------

Route::middleware('auth', 'verified')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard', [
            "title" => "Dashboard",
            "halaman" => "Dashboard User",
        ]);
    })->name('user.dashboard');

    Route::get('/updateprofile', [UserProfileController::class, 'index'])->name('user.profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('user.profile.update');

    Route::get('/token', [TokenController::class, 'index'])->name('user.token.index');
    Route::post('/generate', [TokenController::class, 'create'])->name('user.token.create');
    Route::post('/delete', [TokenController::class, 'destroy'])->name('user.token.destroy');
});

// -------------------------------------------- Admin Routes -------------------------------------------------

Route::middleware('auth', 'verified')->group(function(){
    Route::put('/adminprofile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/rute/{id}', [RuteController::class, 'store'])->name('admin.rute.store');
    Route::resource('adminprofile', AdminProfileController::class);
    Route::resource('angkot', AngkutanKotaController::class);
    Route::resource('rute', RuteController::class);
    Route::resource('jalan', JalanController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('deskripsi', DeskripsiController::class);
});


Route::get('/admin', function () {
    // return view('layouts.mainadmin', [
    //     "title" => "Dashboard"
    // ]);
    return redirect()->route('angkot.index');
})->name('admin.dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('dashboard', [
//         "title" => "Dashboard"
//     ]);
// });
