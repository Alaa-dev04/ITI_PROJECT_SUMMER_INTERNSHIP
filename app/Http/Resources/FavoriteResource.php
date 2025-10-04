<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class FavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'device_id' => $this->device_id,
            'recipe_id' => $this->recipe_id,
            'recipe' => [
                'id' => $this->recipe->id,
                'name' => $this->recipe->name,
                'ingredients' => $this->recipe->ingredients,
                'steps' => $this->recipe->steps,
                'image' => $this->recipe->image,
            ],
        ];
    }
}
