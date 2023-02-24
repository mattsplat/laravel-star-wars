<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lib\UseCase\PlanetUseCase;

class GalaxyPopulationController extends Controller
{
    private PlanetUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(PlanetUseCase::class);
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $galaxyInfo = $this->useCase->getGalaxyInfo();

        return response()->json($galaxyInfo);
    }
}
