<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpeciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "classification" => $this->classification,
            "designation" => $this->designation,
            "average_height" => $this->average_height,
            "skin_colors" => $this->skin_colors,
            "hair_colors" => $this->hair_colors,
            "eye_colors" => $this->eye_colors,
            "average_lifespan" => $this->average_lifespan,
            "homeworld" => $this->homeworld,
            "language" => $this->language,
            "id" => basename($this->url),
        ];
    }
}
