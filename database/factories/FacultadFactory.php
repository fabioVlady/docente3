<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facultad>
 */
class FacultadFactory extends Factory
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
            'nombre_facultad' => 'FAC. ' . $this->faker->word(20),
            'descripcion' => $this->faker->word(20),
            'ubicacion' => $this->faker->word(20),
        ];
    }
}
