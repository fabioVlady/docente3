<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $user = User::create([
            'name' => 'Fabio Cachi Condori',
            'email' => 'fabio@mail.com',
            'password' => bcrypt('123123123')
        ])->assignRole('Admin');
        Persona::create([
            'nombres' => 'Fabio',
            'paterno' => 'Cachi',
            'materno' => 'Condori',
            'ci' => '8408798',
            'extension' => 1,
            'sexo' =>'1',
            'fecnac' => '11-06-1990',
            'user_id' => $user->id,

        ]);
        $user2 = User::create([
            'name' => 'Jose Perez Perez',
            'email' => 'jose@mail.com',
            'password' => bcrypt('123123123')
        ])->assignRole('Admin');
        Persona::create([
            'nombres' => 'Jose',
            'paterno' => 'Perez',
            'materno' => 'Perez',
            'ci' => '12345',
            'extension' => 1,
            'sexo' =>'1',
            'fecnac' => '11-06-1990',
            'user_id' => $user2->id,

        ]);

        $user3 = User::create([
            'name' => 'Jose Perez Perez',
            'email' => 'jose2@mail.com',
            'password' => bcrypt('123123123')
        ])->assignRole('Admin');
        Persona::create([
            'nombres' => 'Jose',
            'paterno' => 'Perez',
            'materno' => 'Perez',
            'ci' => '12345',
            'extension' => 1,
            'sexo' =>'1',
            'fecnac' => '11-06-1990',
            'user_id' => $user3->id,

        ]);
        User::factory(99)->create();
    }
}
