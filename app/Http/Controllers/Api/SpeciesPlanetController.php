<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanetResource;
use App\Lib\UseCase\SpeciesUseCase;
use Illuminate\Http\Request;

class SpeciesPlanetController extends Controller
{
    private SpeciesUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(SpeciesUseCase::class);
    }

    public function index(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $planet = $this->useCase->getSpeciesPlanet($id);
        if(empty($planet)) {
            return response()->json('Not found', 404);
        }

        return response()->json(PlanetResource::make((object)$planet));
    }
}
