<?php

namespace Database\Seeders;

use App\Models\Curso_Idioma;
use App\Models\Pdf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Curso_IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso_idiomas = Curso_Idioma::factory(10)->create();
        
        foreach ($curso_idiomas as $curso_idioma) {
            Pdf::factory(1)->create([
                'pdfable_id' => $curso_idioma->id,
                'pdfable_type' => Curso_Idioma::class
            ]);
        }
    }
}
