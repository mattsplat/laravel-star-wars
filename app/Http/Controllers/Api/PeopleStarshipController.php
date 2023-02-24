<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpaceshipResource;
use App\Lib\Api\StarWarsClient;
use App\Lib\UseCase\PeopleUseCase;
use Illuminate\Http\Request;

class PeopleStarshipController extends Controller
{
    private PeopleUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(PeopleUseCase::class);
    }

    public function index(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $personStarships = $this->useCase->getPersonStarships($id);

        // SPACESHIP SORTING
        usort($personStarships, fn($a, $b) => $a['name'] <=> $b['name']);

        return response()->json(
            SpaceshipResource::collection(
                collect($personStarships)->map(fn($starship) => (object)$starship)
            )
        );
    }
}
