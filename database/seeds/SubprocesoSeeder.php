<?php

use App\Models\Subproceso;
use Illuminate\Database\Seeder;

class SubprocesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subproceso::create(['nombre'=>'ADMISION','estado'=>'activo','codProMA'=>'1','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'OBSERVACION','estado'=>'activo','codProMA'=>'2','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'REFERENCIA Y CONTRARREFERENCIA','estado'=>'activo','codProMA'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'AUDITORIA CONCURRENTE','estado'=>'activo','codProMA'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'EDUCACION DIRECTA A USUARIOS','estado'=>'activo','codProMA'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'GESTION INTEGRAL DE RESIDUOS PELIGROSOS','estado'=>'activo','codProMA'=>'1','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'ELABORACION DE CONTRATOS Y CONVENIOS ','estado'=>'activo','codProMA'=>'2','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'ALMACENAMIENTO, DISTRIBUCION Y DISPENSACION ','estado'=>'activo','codProMA'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'PROCESAMIENTO, ALMACENAMIENTOY DISTRIBUCION','estado'=>'activo','codProMA'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Subproceso::create(['nombre'=>'INFORMACION Y COMUNICACION ','estado'=>'activo','codProMA'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);

    }
}
