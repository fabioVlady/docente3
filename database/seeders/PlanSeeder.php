<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'title' => 'Tema1',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 1
            ],
            [
                'title' => 'Subtema2',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1C4C96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 2
            ],
            [
                'title' => 'Tema23',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 3
            ],
            [
                'title' => 'Tema4',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 4
            ],
            [
                'title' => 'Subtema5',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1C4C96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 5
            ],
            [
                'title' => 'Tema26',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 6
            ],
            [
                'title' => 'Tema7',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 7
            ],
            [
                'title' => 'Subtema8',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1C4C96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 8
            ],
            [
                'title' => 'Tema29',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 9
            ],
            [
                'title' => 'Tema10',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 10
            ],
            [
                'title' => 'Subtema11',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1C4C96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 11
            ],
            [
                'title' => 'Tema212',
                'start' => '10:00:00',
                'end' => '10:30:00',
                'color' => '#1d1c96',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 12
            ]
            
        ]);
    }
}
