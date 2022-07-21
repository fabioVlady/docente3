<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('eventos')->insert([
            [
                'title' => 'Reunion',
                'start' => '2022-05-26',
                'end' => '2022-05-27',
                'color' => '#c40233',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 2
            ],
            [
                'title' => 'Reunion2',
                'start' => '2022-05-27',
                'end' => '2022-05-28',
                'color' => '#0000ff',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 2
            ],
            [
                'title' => 'Reunion3',
                'start' => '2022-05-28',
                'end' => '2022-05-29',
                'color' => '#c40233',
                'descripcion' => 'Reunion con el cliente',
                'id_dicta' => 4
            ]
            
        ]);
    }
}
