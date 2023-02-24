<?php

namespace App\Lib\UseCase;

use App\Lib\Api\StarWarsApiClientInterface;

class PeopleUseCase
{
    private StarWarsApiClientInterface $client;

    public function __construct(StarWarsApiClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPeople($params = []): array
    {
        return $this->client
            ->getPeople()
            ->addParams($params)
            ->get();
    }

    public function getPerson(int $id)
    {
        return $this->client->getPeople($id)->get();
    }

    public function getPersonStarships(int $id): array
    {
        $person = $this->getPerson($id);

        $starshipIds = collect($person['starships'])->map(fn($url) => basename($url));

        $personStarships = [];
        $page = 0;
        while ($page * 10 < $starshipIds->max()) {
            $page++;
            $response = $this->client->getStarships()
                ->addParams(['page' => $page])
                ->get();
            if (empty($response['results'])) {
                continue;
            }
            foreach ($response['results'] as $starship) {
                if ($starshipIds->contains(basename($starship['url']))) {
                    $personStarships [] = $starship;
                }
            }
        }

        return $personStarships;
    }

}
