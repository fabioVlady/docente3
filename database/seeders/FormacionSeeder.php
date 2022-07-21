<?php

namespace Database\Seeders;

use App\Models\Formacion;
use App\Models\Pdf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formacions = Formacion::factory(10)->create();

        foreach ($formacions as $formacion) {
            Pdf::factory(1)->create([
                'pdfable_id' => $formacion->id,
                'pdfable_type' => Formacion::class
            ]);            
        }
    }
}
