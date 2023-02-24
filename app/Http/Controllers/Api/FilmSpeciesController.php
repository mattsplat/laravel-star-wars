<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lib\UseCase\FilmUseCase;
use Illuminate\Http\Request;

class FilmSpeciesController extends Controller
{
    private FilmUseCase $useCase;

    public function __construct()
    {
        $this->useCase = app(FilmUseCase::class);
    }

    public function index(Request $request, $filmId): \Illuminate\Http\JsonResponse
    {
        $species = $this->useCase->getFilmSpecies($filmId);
        if(empty($species)) {
            return response()->json('Not found', 404);
        }
        return response()->json($species);
    }
}
