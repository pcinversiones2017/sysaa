<?php

use Illuminate\Database\Seeder;
use App\Models\Cargofuncional;

class CargoFuncionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargofuncional::create(['nombre' => 'JEFE OCI']);
        Cargofuncional::create(['nombre' => 'AUDITOR']);
    }
}
