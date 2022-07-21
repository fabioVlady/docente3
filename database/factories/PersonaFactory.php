<?php

namespace Database\Factories;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->unique()->word([20]),
            'paterno' => $this->faker->unique()->word(20),
            'materno' => $this->faker->unique()->word(20),
            'ci' => $this->faker->numberBetween(8000000,15000000),
            'extension' => $this->faker->randomElement(['CH','OR','TJ','PD','LP','SC','PT','BE','CB']),
            'sexo' => $this->faker->randomElement(['Masculino','Femenino']),
            'fecnac' => $this->faker->date(),
            'user_id' => User::all()->random()->id
        ];
    }
}
