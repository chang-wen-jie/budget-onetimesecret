<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('secrets', \App\Http\Controllers\SecretController::class);

Route::get('/', function () {
    return redirect('secrets');
});

Route::get('/secrets/{link?}', [SecretController::class, 'show'])->name('secrets.show');

Route::post('/', [\App\Http\Controllers\SecretController::class, 'navigate'])->name('path');
