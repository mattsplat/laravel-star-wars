<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function index(SearchRequest $request): \Illuminate\Http\JsonResponse
    {
        $planets = (new \App\Lib\Api\StarWarsClient())
            ->getPlanets()
            ->addParams($request->only('search', 'page'))
            ->get();

        $response['results'] =  \App\Http\Resources\PlanetResource::collection(
            collect($planets['results'])->map(fn ($planet) => (object)$planet));

        return response()->json($response);

    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show(Request $request, int $id)
    {
        $planet = (new \App\Lib\Api\StarWarsClient())
            ->getPlanets($id)
            ->get();

        return response()->json(\App\Http\Resources\PlanetResource::make((object)$planet));
    }
}
