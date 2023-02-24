<?php

namespace App\Lib\Api;

interface StarWarsApiClientInterface
{
    public function getPeople(?int $id = null): self;

    public function getStarships(?int $id = null): self;

    public function getFilms(?int $id = null): self;

    public function getSpecies(?int $id = null);

    public function getPlanets(?int $id = null);

}
