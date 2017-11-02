<?php

use App\Models\Procesoma;
use Illuminate\Database\Seeder;

class ProcesomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procesoma::create(['nombre'=>'SERVICIOS AMBULATORIOS','codMacroP'=>'1','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procesoma::create(['nombre'=>'ATENCION INTEGRAL DE URGENCIAS','codMacroP'=>'2','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procesoma::create(['nombre'=>'PLANEACION ESTRATEGICA','codMacroP'=>'4','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procesoma::create(['nombre'=>'SISTEMA DE INFORMACION','codMacroP'=>'3','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procesoma::create(['nombre'=>'INFORMACION Y COMUNICACION ','codMacroP'=>'5','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);

    }
}
