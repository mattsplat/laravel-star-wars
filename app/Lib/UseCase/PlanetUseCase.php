<?php

namespace App\Lib\UseCase;

class PlanetUseCase extends AbstractUseCase
{
    public function getPlanet(int $id): array
    {
        return $this->client->getPlanets($id)->get();
    }

    public function getPlanets(array $params = []): array
    {
        return $this->client->getPlanets()
            ->addParams($params)
            ->get();
    }

    public function getGalaxyInfo(): array
    {
        $planets = [];
        $page = 1;
        do {
            $response = $this->client->getPlanets()
                ->addParams(['page' => $page])
                ->get();
            $planets = array_merge($planets, $response['results']);
            $page++;
        } while (!empty($response['next']));

        $population = 0;
        foreach ($planets as $planet) {
            $population += (int)$planet['population'];
        }
        $planets = count($planets);

        return compact('population', 'planets');
    }
}
