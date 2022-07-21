<?php

namespace Database\Seeders;

use App\Models\Docente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docente = Docente::create([
            'item' => 'b123',
            'grado' => 'PHD',
            'tipo' => 'Planta',
            'persona_id' => 1
        ]);
        Docente::factory(2)->create();
        
    }
}
