<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Health>
 */
class HealthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->limit(1)->first();
        $date = \Carbon\Carbon::createFromTimeStamp(fake()->dateTimeBetween('-1 years', '+1 month')->getTimestamp());
        return [
            'user_id' => $user->id,
            'weight' => $this->faker->randomFloat(2, 50, 100),
            'height' => $this->faker->randomFloat(2, 140, 220),
            'bmi' => $this->faker->randomFloat(2, 10, 40),
            'blood_pressure' => $this->faker->randomFloat(2, 60, 200),
            'blood_sugar' => $this->faker->randomFloat(2, 60, 200),
            'date' => $date->timezone('America/El_Salvador')->toDateTimeString(),
        ];
    }
}
