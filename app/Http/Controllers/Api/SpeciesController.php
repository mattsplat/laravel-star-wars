<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lib\UseCase\SpeciesUseCase;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    private SpeciesUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(SpeciesUseCase::class);
    }
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $response = $this->useCase->getSpecies($request->only('search', 'page'));
        $response['results'] = \App\Http\Resources\SpeciesResource::collection(
            collect($response['results'])->map(fn($specie) => (object)$specie)
        );

        return response()->json($response);
    }


    public function show(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $specie = $this->useCase->getSpecie($id);
        if(empty($specie)) {
            return response()->json('Not found', 404);
        }

        return response()->json(\App\Http\Resources\SpeciesResource::make((object)$specie));
    }
}
