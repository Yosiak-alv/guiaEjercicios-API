<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Routine>
 */
class RoutineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->limit(1)->first();
        return [
            'user_id' => $user->id,
            'routine_name' => $this->faker->word,
            'routine_description' => $this->faker->sentence,
            'routine_duration' => $this->faker->randomElement(['30 minutos', '1 hora', '45 minutos', '20 minutos']),
            'routine_type' => $this->faker->randomElement(['Aeróbico', 'Fuerza', 'Flexibilidad', 'Equilibrio']),
            'recommended_weight' => $this->faker->randomElement(['Peso normal', 'Peso bajo', 'Peso alto']),
            'recommended_BMI' => $this->faker->randomElement(['18.5 - 24.9', '25 - 29.9', '30 o más']),
            'recommended_blood_pressure' => $this->faker->randomElement(['120/80 mm Hg', '130/85 mm Hg', '140/90 mm Hg']),
            'recommended_blood_sugar' => $this->faker->randomElement(['Menos de 100 mg/dL', '100-125 mg/dL', 'Más de 125 mg/dL']),
        ];
    }
}
