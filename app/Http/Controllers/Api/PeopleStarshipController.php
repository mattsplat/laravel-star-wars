<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpaceshipResource;
use Illuminate\Http\Request;

class PeopleStarshipController extends Controller
{
    public function index(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $person = (new \App\Lib\Api\StarWarsClient())
            ->getPeople($id)
            ->get();

        $starshipIds = collect($person['starships'])->map(fn($url) => basename($url));
        $personStarships = [];

        $page = 0;
        while ($page * 10 < $starshipIds->max()) {
            $page++;
            $response = (new \App\Lib\Api\StarWarsClient())
                ->getStarships()
                ->addParams(['page' => $page])
                ->get();
            if (empty($response['results'])) {
                continue;
            }
            foreach ($response['results'] as $starship) {
                if ($starshipIds->contains(basename($starship['url']))) {
                    $personStarships [] = $starship;
                }
            }
        }

        // SPACESHIP SORTING
        usort($personStarships, fn($a, $b) => $a['name'] <=> $b['name']);

        return response()->json(
            SpaceshipResource::collection(
                collect($personStarships)->map(fn($starship) => (object)$starship)
            )
        );
    }
}
