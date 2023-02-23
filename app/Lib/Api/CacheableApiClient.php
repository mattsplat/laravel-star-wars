<?php

namespace App\Lib\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;

abstract class CacheableApiClient
{
    protected Client $client;
    protected string $baseUri;
    protected int $cacheTime = 300;
    protected string $cacheKey = __CLASS__;
    protected string $path;
    protected array $params = [];

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        if (empty($this->baseUri)) {
            throw new \Exception('Base URI is not set');
        }

        $this->client = new Client([
            'base_uri' => $this->baseUri,
        ]);
    }

    /**
     * Add params to the request
     * @param array $params
     * @return $this
     */
    public function addParams(array $params): self
    {
        $this->params = array_merge($this->params, $params);
        return $this;
    }

    /**
     * @return string
     */
    protected function getCacheKey(): string
    {
        return implode(':', [$this->cacheKey, $this->path, ...$this->params]);
    }

    /**
     * Get the results from the API
     *
     * @return array
     */
    public function get(): array
    {

        return Cache::remember($this->getCacheKey(), $this->cacheTime, function () {
            try {
                $response = $this->client->get($this->path, [
                    'query' => $this->params
                ]);
            } catch (GuzzleException $e) {
                return [];
            }

            return json_decode($response->getBody(), true);
        });
    }

    protected function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }
}
