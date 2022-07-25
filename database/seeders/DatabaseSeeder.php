<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Facultad;
use App\Models\Libro;
use App\Models\Materia;
use App\Models\Persona;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('pdfs');
        Storage::makeDirectory('pdfs');
        $this->call(RoleSeeder::class);

        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        Persona::factory(4)->create();
        $this->call(Curso_IdiomaSeeder::class);
        $this->call(ExperienciaSeeder::class);
        $this->call(FormacionSeeder::class);
        $this->call(Curso_extraSeeder::class);
        $this->call(DocenteSeeder::class);

        Facultad::factory(10)->create();
        Carrera::factory(20)->create();
        
        // $this->call(Docente_MateriaSeeder::class);
        $this->call(Docente_MateriaSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(PlanSeeder::class);
        Libro::factory(10)->create();
    }
}
