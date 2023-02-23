<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(SearchRequest $request): \Illuminate\Http\JsonResponse
    {
        $response = (new \App\Lib\Api\StarWarsClient())
            ->getFilms()
            ->get();

        $response['results'] =  \App\Http\Resources\FilmResource::collection(
            collect($response['results'])->map(fn($film) => (object)$film)
        );
        return response()->json($response);
    }
}
