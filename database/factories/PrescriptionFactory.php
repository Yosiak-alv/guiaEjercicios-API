<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->limit(1)->first();
        $disese = Disease::inRandomOrder()->limit(1)->first(); 
        $starts_at = \Carbon\Carbon::createFromTimeStamp(fake()->dateTimeBetween('-1 years', '+1 month')->getTimestamp());
        $each = fake()->numberBetween(1, 20);
        return [
            'user_id' => $user->id,
            'disease_id' => $disese->id,
            'medication_name' => $this->faker->name,
            'dose_amount' => $this->faker->randomDigit,
            'dose_unit' => $this->faker->randomElement(['mg', 'ml', 'g', 'l']),
            'date' => $starts_at->timezone('America/El_Salvador')->toDateTimeString(),
            'each' => $each,
            'next_dose' => $starts_at->timezone('America/El_Salvador')->addHours($each)->toDateTimeString(),
        ];
    }
}
