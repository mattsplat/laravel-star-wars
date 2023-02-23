<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilmSpeciesController extends Controller
{
    // get all species from film
    public function index(Request $request, $filmId): \Illuminate\Http\JsonResponse
    {
        $film = (new \App\Lib\Api\StarWarsClient())
            ->getFilms($filmId)
            ->get();

        $species = [];
        foreach ($film['species'] as $speciesUrl) {
            $species[] = (new \App\Lib\Api\StarWarsClient())
                ->getSpecies(basename($speciesUrl))
                ->get();
        }

        return response()->json($species);
    }
}
