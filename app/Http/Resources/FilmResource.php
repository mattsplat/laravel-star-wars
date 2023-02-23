<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => basename($this->url),
            'title' => $this->title,
            'episode_id' => $this->episode_id,
            'opening_crawl' => $this->opening_crawl,
            'director' => $this->director,
            'producer' => $this->producer,
            'release_date' => $this->release_date,
            'characters' => array_map(fn($ch) => basename($ch), $this->characters),
        ];
    }
}
