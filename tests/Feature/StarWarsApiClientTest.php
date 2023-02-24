<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StarWarsApiClientTest extends TestCase
{
    //People
    /**
     * A basic feature test example.
     */
    public function test_people_api_gets_valid_response(): void
    {
        $response = $this->get('/api/people');

        $response->assertStatus(200);
    }

    public function test_person_api_gets_valid_response(): void
    {
        $response = $this->get('/api/people/1');

        $response->assertStatus(200);
    }


    // species
    public function test_species_api_gets_valid_response(): void
    {
        $response = $this->get('/api/species');

        $response->assertStatus(200);
    }

    public function test_species_api_gets_valid_response_with_valid_id(): void
    {
        $response = $this->get('/api/species/1');

        $response->assertStatus(200);
    }

    public function test_species_api_gets_valid_response_with_invalid_id(): void
    {
        $response = $this->get('/api/species/9000');

        $response->assertStatus(404);
    }

    public function test_species_planet_api_gets_valid_response(): void
    {
        $response = $this->get('/api/species/1/planet');

        $response->assertStatus(200);
    }

    public function test_species_planet_api_gets_valid_response_with_invalid_id(): void
    {
        $response = $this->get('/api/species/9000/planet');

        $response->assertStatus(404);
    }

    //films
    public function test_film_api_gets_valid_response(): void
    {
        $response = $this->get('/api/films');

        $response->assertStatus(200);
    }

    public function test_film_api_gets_valid_response_with_valid_id(): void
    {
        $response = $this->get('/api/films/1');

        $response->assertStatus(200);
    }

    public function test_film_api_gets_valid_response_with_invalid_id(): void
    {
        $response = $this->get('/api/films/9000');

        $response->assertStatus(404);
    }

    public function test_film_species_api_gets_valid_response(): void
    {
        $response = $this->get('/api/films/1/species');

        $response->assertStatus(200);
    }

    public function test_film_species_api_gets_valid_response_with_invalid_id(): void
    {
        $response = $this->get('/api/films/9000/species');

        $response->assertStatus(404);
    }

    //planets
    public function test_planet_api_gets_valid_response(): void
    {
        $response = $this->get('/api/planets');

        $response->assertStatus(200);
    }

    public function test_planet_api_gets_valid_response_with_valid_id(): void
    {
        $response = $this->get('/api/planets/1');

        $response->assertStatus(200);
    }

    public function test_planet_api_gets_valid_response_with_invalid_id(): void
    {
        $response = $this->get('/api/planets/9000');

        $response->assertStatus(404);
    }

    public function test_galaxy_api_gets_valid_response(): void
    {
        $response = $this->get('/api/planets/galaxy');

        $response->assertStatus(200);
    }
}
