<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.mainadmin');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/adminprofile', function () {
    return view('adminprofile', [
        "title" => "Profil",
        "halaman" => "Data Administrator"
    ]);
});

Route::get('/angkot', function () {
    return view('angkot', [
        "title" => "Angkot",
        "halaman" => "Data Angkot"
    ]);
});

Route::get('/rute', function () {
    return view('rute', [
        "halaman" => "Data Rute Lintasan Angkot"
    ]);
});

Route::get('/namajalan', function () {
    return view('namajalan', [
        "halaman" => "Data Nama Jalan"
    ]);
});

Route::get('/lokasi', function () {
    return view('lokasi', [
        "title" => "Lokasi",
        "halaman" => "Data Lokasi"
    ]);
});

Route::get('/deskripsi', function () {
    return view('deskripsi', [
        "title" => "Deskripsi"
    ]);
});