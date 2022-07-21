<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),

            'editorial' => $this->faker->name(),
            'gestion_publicacion' => $this->faker->numberBetween(2000,2022),
            'fecha_publicacion' => $this->faker->date(),
            'edicion' => $this->faker->firstName(),
            'persona_id' => Persona::all()->random()->id
        ];
    }
}
