<?php

namespace App\Lib\UseCase;

class PlanetUseCase extends AbstractUseCase
{
    public function getPlanet(int $id): array
    {
        return $this->client->getPlanets($id)->get();
    }

    public function getPlanets(): array
    {
        return $this->client->getPlanets()->get();
    }

    public function getGalaxyInfo(): array
    {
        $planets = $this->client->getPlanets()->get();
        $population = 0;
        foreach ($planets['results'] as $planet) {
            $population += (int)$planet['population'];
        }
        $planets = count($planets);

        return compact('population', 'planets');
    }
}
