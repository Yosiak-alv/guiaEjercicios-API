<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HealthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            'user_id' => UserResource::make($this->whenLoaded('user')),
            'weight' => $this->weight,
            'height' => $this->height,
            'bmi' => $this->bmi,
            'blood_pressure' =>$this->blood_pressure,
            'blood_sugar' => $this->blood_sugar,
            'date' => $this->date,
        ];
    }
}
