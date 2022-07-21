<?php

namespace Database\Seeders;

use App\Models\Curso_extra;
use App\Models\Pdf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Curso_extraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso_extras = Curso_extra::factory(10)->create();
        
        foreach ($curso_extras as $curso_extra) {
            Pdf::factory(1)->create([
                'pdfable_id' => $curso_extra->id,
                'pdfable_type' => Curso_extra::class
            ]);
        }
    }
}
