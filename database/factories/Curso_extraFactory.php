<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso_extra>
 */
class Curso_extraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_curso' => $this->faker->word(20),
            'institucion' => $this->faker->word(20),
            'horas' => $this->faker->numberBetween(1,100),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'persona_id' => Persona::all()->random()->id
        ];
    }
}
