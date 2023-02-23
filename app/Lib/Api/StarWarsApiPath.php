<?php

namespace App\Lib\Api;


enum StarWarsApiPath: string
{
    case People = 'people';
    case Planets = 'planets';
    case Starships = 'starships';
    case Vehicles = 'vehicles';
    case Species = 'species';
    case Films = 'films';
}
