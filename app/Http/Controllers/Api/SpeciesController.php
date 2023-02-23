<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $response = (new \App\Lib\Api\StarWarsClient())
            ->getSpecies()
            ->addParams($request->only('search', 'page'))
            ->get();

        $response['results'] = \App\Http\Resources\SpeciesResource::collection(
            collect($response['results'])->map(fn($specie) => (object)$specie)
        );

        return response()->json($response);
    }


    public function show(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $specie = (new \App\Lib\Api\StarWarsClient())
            ->getSpecies($id)
            ->get();

        return response()->json(\App\Http\Resources\SpeciesResource::make((object)$specie));
    }
}
