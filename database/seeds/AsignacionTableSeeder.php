<?php

use Illuminate\Database\Seeder;
use App\Models\Usuariorol;

class AsignacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuariorol::create(['codUsu' => 1, 'codRol' => 1, 'codCarFun' => 1]);
    }
}
