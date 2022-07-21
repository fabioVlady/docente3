<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formacion>
 */
class FormacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nivel_estudio' => $this->faker->randomElement(['primaria','secundaria','bachiller','licenciatura']),
            'institucion' => $this->faker->randomElement(['INS. COLEGIO1','INT Escuela']),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'persona_id' => Persona::all()->random()->id
        ];
    }
}
