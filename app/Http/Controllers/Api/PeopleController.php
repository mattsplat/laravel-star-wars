<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\PersonResource;
use App\Lib\Api\StarWarsClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(SearchRequest $request) : \Illuminate\Http\JsonResponse
    {
        $response = (new StarWarsClient())
            ->getPeople()
            ->addParams($request->only('search', 'page'))
            ->get();

        $response['results'] =  PersonResource::collection(
            collect($response['results'])->map(fn ($person) => (object)$person));
        return response()->json($response);
    }


    public function show(Request $request, int $id) : \Illuminate\Http\JsonResponse
    {
        $person = (new StarWarsClient())
            ->getPeople($id)
            ->get();

        return response()->json(PersonResource::make((object)$person));
    }
}
