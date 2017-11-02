<?php

use App\Models\Actividad;
use Illuminate\Database\Seeder;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actividad::create(['responsable'=>'ADMINISTRACION','nombre'=>'PROCEDIMIENTO CONTRARREFERENCIA','codProSP'=>'1','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'SISTEMAS','nombre'=>'OBSERVACION COMUNICACION','codProSP'=>'2','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'RRHH','nombre'=>'REFERENCIA Y CONTRARREFERENCIA','codProSP'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'GERENCIA','nombre'=>'AUDITORIA CONCURRENTE','codProSP'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'CONTABILIDAD','nombre'=>'EDUCACION ALMACENAMIENTOY DIRECTA A USUARIOS','codProSP'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'RRHH','nombre'=>'GESTION ALMACENAMIENTOY INTEGRAL DE RESIDUOS PELIGROSOS','codProSP'=>'6','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'ADMINISTRACION','nombre'=>'ELABORACION DE CONTRATOS ALMACENAMIENTOY Y CONVENIOS ','codProSP'=>'2','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'RRHH','nombre'=>'ALMACENAMIENTO, DISTRIBUCION Y DISPENSACION ','codProSP'=>'7','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'GERENCIA','nombre'=>'PROCESAMIENTO, ALMACENAMIENTOY DISTRIBUCION','codProSP'=>'8','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'SISTEMAS','nombre'=>'INFORMACION Y COMUNICACION ','codProSP'=>'9','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'OPERACIONES','nombre'=>'PROCEDIMIENTO 01','codProSP'=>'1','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'ADMINISTRACION','nombre'=>'OBSERVACION','codProSP'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'OPERACIONES','nombre'=>'REFERENCIA Y CONTRARREFERENCIA','codProSP'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'CONTABILIDAD','nombre'=>'AUDITORIA CONCURRENTE','codProSP'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'ADMINISTRACION','nombre'=>'EDUCACION DIRECTA A USUARIOS','codProSP'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'CONTABILIDAD','nombre'=>'GESTION INTEGRAL DE RESIDUOS PELIGROSOS','codProSP'=>'6','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'SISTEMAS','nombre'=>'ELABORACION DE CONTRATOS Y CONVENIOS ','codProSP'=>'8','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'ADMINISTRACION','nombre'=>'ALMACENAMIENTO CONVENIOS, DISTRIBUCION Y DISPENSACION ','codProSP'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'SISTEMAS','nombre'=>'PROCESAMIENTO, ALMACENAMIENTOY DISTRIBUCION','codProSP'=>'9','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Actividad::create(['responsable'=>'RRHH','nombre'=>'INFORMACION Y COMUNICACION ','codProSP'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
    }
}
