<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre' => 'JEFE OCI']);
        Rol::create(['nombre' => 'SUPERVISOR']);
        Rol::create(['nombre' => 'AUDITOR']);
    }
}
