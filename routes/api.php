<?php

use Illuminate\Http\Request;
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

Route::middleware('api')->group(function () {
    Route::get('people', [App\Http\Controllers\Api\PeopleController::class, 'index']);
    Route::get('people/{id}', [App\Http\Controllers\Api\PeopleController::class, 'show']);

    Route::get('people/{id}/starships', [App\Http\Controllers\Api\PeopleStarshipController::class, 'index']);
    // species
    Route::get('species', [App\Http\Controllers\Api\SpeciesController::class, 'index']);
    Route::get('species/{id}', [App\Http\Controllers\Api\SpeciesController::class, 'show']);

    // films
    Route::get('films', [App\Http\Controllers\Api\FilmController::class, 'index']);

    // film species
    Route::get('films/{id}/species', [App\Http\Controllers\Api\FilmSpeciesController::class, 'index']);

    // species planets
    Route::get('species/{id}/planets', [App\Http\Controllers\Api\SpeciesPlanetController::class, 'index']);


    // planets
    Route::get('planets/galaxy', [App\Http\Controllers\Api\GalaxyPopulationController::class, 'index']);
    Route::get('planets', [App\Http\Controllers\Api\PlanetController::class, 'index']);
    Route::get('planets/{id}', [App\Http\Controllers\Api\PlanetController::class, 'index']);
});

