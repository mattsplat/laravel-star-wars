<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class GalaxyPopulationController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        // get sum of population of all planets
        $planets = (new \App\Lib\Api\StarWarsClient())
            ->getPlanets()
            ->get();

        $population = 0;
        foreach ($planets['results'] as $planet) {
            $population += (int)$planet['population'];
        }

        return response()->json(['population' => $population, 'planets' => count($planets['results'])]);
    }
}
