<?php

namespace Database\Factories;

use App\Models\Facultad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrera>
 */
class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nombre_carrera' => $this->faker->word(20),
            'descripcion' => $this->faker->sentence(),
            'ubicacion' => $this->faker->sentence(),
            'facultad_id' => Facultad::all()->random()->id
        ];
    }
}
