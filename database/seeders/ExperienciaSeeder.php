<?php

namespace Database\Seeders;

use App\Models\Experiencia;
use App\Models\Pdf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiencias = Experiencia::factory(10)->create();
        
        foreach ($experiencias as $experiencia) {
            Pdf::factory(1)->create([
                'pdfable_id' => $experiencia->id,
                'pdfable_type' => Experiencia::class
            ]);
        }
    }
}
