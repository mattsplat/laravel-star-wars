<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Lib\UseCase\PlanetUseCase;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    private PlanetUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(PlanetUseCase::class);
    }

    public function index(SearchRequest $request): \Illuminate\Http\JsonResponse
    {
        $response = $this->useCase->getPlanets($request->only('search', 'page'));

        $response['results'] = \App\Http\Resources\PlanetResource::collection(
            collect($response['results'])->map(fn($planet) => (object)$planet));

        return response()->json($response);

    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(Request $request, int $id)
    {
        $planet = $this->useCase->getPlanet($id);
        if(empty($planet)) {
            return response()->json('Not found', 404);
        }
        return response()->json(\App\Http\Resources\PlanetResource::make((object)$planet));
    }
}
