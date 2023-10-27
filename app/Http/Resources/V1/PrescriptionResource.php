<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'disease' => DiseaseResource::make($this->whenLoaded('disease')),
            'medication_name' => $this->medication_name,
            'dose_amount' => $this->dose_amount,
            'dose_unit' => $this->dose_unit,
            'date' => $this->date,
            'each' => $this->each,
            'next_dose' => $this->next_dose,
        ];
    }
}
