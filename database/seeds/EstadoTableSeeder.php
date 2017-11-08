<?php

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['nombre' => 'NUEVO']);
        Estado::create(['nombre' => 'PENDIENTE']);
        Estado::create(['nombre' => 'TERMINADO']);
        Estado::create(['nombre' => 'APROBADO']);
        Estado::create(['nombre' => 'RECHAZADO']);
    }
}
