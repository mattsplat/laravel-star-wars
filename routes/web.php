<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/planets', [\App\Http\Controllers\HomeController::class, 'planets'])->name('planets');
Route::get('/films', [\App\Http\Controllers\HomeController::class, 'films'])->name('films');
Route::get('/species', [\App\Http\Controllers\HomeController::class, 'species'])->name('species');
Route::get('/people', [\App\Http\Controllers\HomeController::class, 'people'])->name('people');
Route::get('/people/{id}', [\App\Http\Controllers\HomeController::class, 'person'])->name('person');


