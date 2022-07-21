<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item' => $this->faker->word(20),
            'grado' => $this->faker->randomElement(['PhD','Lic','Mg']),
            'tipo' => $this->faker->randomElement(['Invitado','De Planta','Venemerito']),
            'persona_id' => Persona::all()->unique()->random()->id            
        ];
    }
}
