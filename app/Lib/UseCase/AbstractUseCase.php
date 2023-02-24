<?php

namespace App\Lib\UseCase;

use App\Lib\Api\StarWarsApiClientInterface;

abstract class AbstractUseCase
{
    protected StarWarsApiClientInterface $client;

    public function __construct(StarWarsApiClientInterface $client)
    {
        $this->client = $client;
    }
}
