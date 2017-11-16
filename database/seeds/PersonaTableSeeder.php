<?php

use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create(['email' => 'gilmarmoreno1993@gmail.com', 'nombres' => 'GILMAR', 'paterno' => 'GILMAR', 'materno' => 'GILMAR']);
        Persona::create(['email' => 'cesarhm1687@gmail.com', 'nombres' => 'CESAR', 'paterno' => 'CESAR', 'materno' => 'CESAR']);
        Persona::create(['email' => 'roberth1136@gmail.com', 'nombres' => 'ROBERTH', 'paterno' => 'ROBERTH', 'materno' => 'ROBERTH']);
        Persona::create(['email' => 'jose@gmail.com', 'nombres' => 'JOSE', 'paterno' => 'JOSE', 'materno' => 'JOSE']);
        Persona::create(['email' => 'maria@gmail.com', 'nombres' => 'MARIA', 'paterno' => 'MARIA', 'materno' => 'MARIA']);
        Persona::create(['email' => 'sofia@gmail.com', 'nombres' => 'SOFIA', 'paterno' => 'SOFIA', 'materno' => 'SOFIA']);
    }
}
