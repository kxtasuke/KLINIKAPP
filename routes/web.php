<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pasien', App\Http\Controllers\PasienController::class);
Route::resource('polis', App\Http\Controllers\PoliController::class);