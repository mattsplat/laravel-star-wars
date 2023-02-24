<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\PersonResource;
use App\Lib\Api\StarWarsClient;
use App\Lib\UseCase\PeopleUseCase;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private PeopleUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(PeopleUseCase::class);
    }
    public function index(SearchRequest $request): \Illuminate\Http\JsonResponse
    {
        $response= $this->useCase->getPeople($request->only('search', 'page'));

        $response['results'] = PersonResource::collection(
            collect($response['results'])->map(fn($person) => (object)$person));
        return response()->json($response);
    }


    public function show(Request $request, int $id,): \Illuminate\Http\JsonResponse
    {
        $person = $this->useCase->getPerson($id);
        if(empty($person)) {
            return response()->json('Not found', 404);
        }

        return response()->json(PersonResource::make((object)$person));
    }
}
