<?php

namespace App\Lib\UseCase;

class FilmUseCase extends AbstractUseCase
{
    public function getFilm(int $id): array
    {
        return $this->client->getFilms($id)->get();
    }

    public function getFilms(): array
    {
        return $this->client->getFilms()->get();
    }

    public function getFilmSpecies($id)
    {
        $film = $this->client->getFilms($id)->get();

        // get all species
        $species = [];
        $page = 1;
        do {
            $response = $this->client->getSpecies()
                ->addParams(['page' => $page])
                ->get();
            $page++;

            $species = array_merge($species, $response['results']);
        } while (!empty($response['next']));


        return array_filter(
            $species,
            function ($specie) use ($id) {
                return in_array($id, array_map(fn($film) => basename($film) === $id, $specie['films']));
            }
        );
    }
}
