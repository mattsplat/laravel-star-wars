<?php

namespace App\Lib\Api;

class StarWarsClient extends CacheableApiClient
{
    protected string $baseUri = 'https://swapi.dev/api/';
    protected string $cacheKey = 'starwars';


    /**
     * Get the people from the API
     */
    public function getPeople(?int $id = null): self
    {
        return $this->setPathByType(StarWarsApiPath::People, $id);
    }

    /**
     * Get the starships from the API
     */
    public function getStarships(?int $id = null): self
    {
        return $this->setPathByType(StarWarsApiPath::Starships, $id);
    }


    /**
     * Get the movies from the API
     */
    public function getFilms(?int $id = null): self
    {
        return $this->setPathByType(StarWarsApiPath::Films, $id);
    }

    /**
     * Get the species from the API
     */
    public function getSpecies(?int $id = null): self
    {
        return $this->setPathByType(StarWarsApiPath::Species, $id);
    }


    /**
     * Get planets from the API
     */
    public function getPlanets(?int $id = null): self
    {
        return $this->setPathByType(StarWarsApiPath::Planets, $id);
    }


    function setPathByType(StarWarsApiPath $type, $id = null) : self
    {
        $this->setPath($type->value . ($id ? '/' . $id : ''));

        return $this;
    }


}


