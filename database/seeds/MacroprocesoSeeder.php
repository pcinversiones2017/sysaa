<?php

use App\Models\Macroproceso;
use Illuminate\Database\Seeder;

class MacroprocesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Macroproceso::create(['nombre'=>'CAPTACIONES Y SERVICIOS','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Macroproceso::create(['nombre'=>'PLANEACION ESTRATEGICA','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Macroproceso::create(['nombre'=>'ADMINISTACION DOCUMENTAL Y ESTADISTICA','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Macroproceso::create(['nombre'=>'GESTION INTEGRAL DE LA CALIDAD','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Macroproceso::create(['nombre'=>'GESTION ASISTENCIAL','estado'=>'activo','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
    }
}
