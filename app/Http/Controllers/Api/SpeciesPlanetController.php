<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpeciesPlanetController extends Controller
{
    public function index(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $response = (new \App\Lib\Api\StarWarsClient())
            ->getSpecies($id)
            ->get();

        // get planets of species
        $planet = (new \App\Lib\Api\StarWarsClient())
            ->getPlanets(basename($response['homeworld']))
            ->get();

        return response()->json($planet);
    }
}
