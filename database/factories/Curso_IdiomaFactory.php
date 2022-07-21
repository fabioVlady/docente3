<?php

namespace Database\Factories;

use App\Models\Curso_Idioma;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso_Idioma>
 */
class Curso_IdiomaFactory extends Factory
{
    protected $model = Curso_Idioma::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idioma' => $this->faker->word(20),
            'lectura' => $this->faker->randomElement([1,2,3,4,5]),
            'escritura' => $this->faker->randomElement([1,2,3,4,5]),
            'comprension' => $this->faker->randomElement([1,2,3,4,5]),
            'conversacion' => $this->faker->randomElement([1,2,3,4,5]),
            'nombre_instituto' => $this->faker->sentence(),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'persona_id' => Persona::all()->random()->id

        ];
    }
}
