<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diseases = [
            "Gripe",
            "Diabetes",
            "Hipertensión",
            "Asma",
            "Artritis",
            "Cáncer",
            "VIH/SIDA",
            "Enfermedad de Alzheimer",
            "Parkinson",
            "Esquizofrenia",
            "Enfermedad de Crohn",
            "Epilepsia",
            "Fibromialgia",
            "Síndrome de Fatiga Crónica",
            "Osteoporosis",
            "Migraña",
            "Obesidad",
            "Anemia",
            "Enfermedad Cardiovascular",
            "Enfermedad Renal Crónica",
            "Artritis Reumatoide",
            "Enfermedad de Lyme",
            "Hepatitis",
            "Celiaquía",
            "Enfermedad de Raynaud",
            "Lupus",
        ];

        Disease::factory(count($diseases))->sequence( fn ($sqn) => ['name' => $diseases[$sqn->index],'description' => fake()->paragraph(1)])->create();

    }
}
