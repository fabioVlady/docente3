<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experiencia>
 */
class ExperienciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_empresa' => $this->faker->word(20),
            'tipo_institucion' => $this->faker->randomElement(['publico','privado']),
            'cargo' => $this->faker->word(20),
            'funciones' => $this->faker->sentence(),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'persona_id' => Persona::all()->random()->id
        ];
    }
}
