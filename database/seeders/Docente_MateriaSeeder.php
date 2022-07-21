<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Docente_MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias =  Materia::factory(20)->create();
        foreach ($materias as $materia) {
            $materia->docentes()->attach([
                rand(1, 2),
            ]);
        }
    }
}
