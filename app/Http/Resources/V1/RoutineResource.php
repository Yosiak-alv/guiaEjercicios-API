<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Routine extends JsonResource
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
            'routine_name' => $this->routine_name,
            'routine_description' => $this->routine_description,
            'routine_duration' => $this->routine_duration,
            'routine_type' => $this->routine_type,
            'recommended_weight' => $this->recommended_weight,
            'recommended_BMI' => $this->recommended_BMI,
            'recommended_blood_pressure' => $this->recommended_blood_pressure,
            'recommended_blood_sugar' => $this->recommended_blood_sugar,
        ];
    }
}
