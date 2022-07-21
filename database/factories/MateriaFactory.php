<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_materia' => $this->faker->word(20),
            'sigla' => $this->faker->word(6),
            'descripcion' => $this->faker->sentence(),
            'carrera_id' => Carrera::all()->random()->id
        ];
    }
}
