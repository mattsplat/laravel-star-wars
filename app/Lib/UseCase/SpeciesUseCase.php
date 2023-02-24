<?php

namespace App\Lib\UseCase;

class SpeciesUseCase extends AbstractUseCase
{
    public function getSpecies(array $params = []): array
    {
        return $this->client->getSpecies()
            ->addParams($params)
            ->get();
    }

    public function getSpecie(int $id)
    {
        return $this->client->getSpecies($id)->get();
    }

    public function getSpeciesPlanet($id)
    {
        $specie = $this->client->getSpecies($id)->get();
        if(empty($specie['homeworld'])) {
            return [];
        }
        $planetId = (int)basename($specie['homeworld']);

        return $this->client
            ->getPlanets($planetId)
            ->get();
    }
}
