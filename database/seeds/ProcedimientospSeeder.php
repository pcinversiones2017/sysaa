<?php

use App\Models\Procedimientosp;
use Illuminate\Database\Seeder;

class ProcedimientospSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedimientosp::create(['nombre'=>'PROCEDIMIENTO CONTRARREFERENCIA','codSubPro'=>'1','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'OBSERVACION COMUNICACION','codSubPro'=>'2','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'REFERENCIA Y CONTRARREFERENCIA','codSubPro'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'AUDITORIA CONCURRENTE','codSubPro'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'EDUCACION ALMACENAMIENTOY DIRECTA A USUARIOS','codSubPro'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'GESTION ALMACENAMIENTOY INTEGRAL DE RESIDUOS PELIGROSOS','codSubPro'=>'6','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'ELABORACION DE CONTRATOS ALMACENAMIENTOY Y CONVENIOS ','codSubPro'=>'2','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'ALMACENAMIENTO, DISTRIBUCION Y DISPENSACION ','codSubPro'=>'7','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'PROCESAMIENTO, ALMACENAMIENTOY DISTRIBUCION','codSubPro'=>'8','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'INFORMACION Y COMUNICACION ','codSubPro'=>'9','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'PROCEDIMIENTO 01','codSubPro'=>'1','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'OBSERVACION','codSubPro'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'REFERENCIA Y CONTRARREFERENCIA','codSubPro'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'AUDITORIA CONCURRENTE','codSubPro'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'EDUCACION DIRECTA A USUARIOS','codSubPro'=>'5','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'GESTION INTEGRAL DE RESIDUOS PELIGROSOS','codSubPro'=>'6','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'ELABORACION DE CONTRATOS Y CONVENIOS ','codSubPro'=>'8','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'ALMACENAMIENTO CONVENIOS, DISTRIBUCION Y DISPENSACION ','codSubPro'=>'4','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'PROCESAMIENTO, ALMACENAMIENTOY DISTRIBUCION','codSubPro'=>'9','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
        Procedimientosp::create(['nombre'=>'INFORMACION Y COMUNICACION ','codSubPro'=>'3','fecha_creado'=>'2017-11-02 02:12:04','fecha_modificado'=>'2017-11-10 02:12:04']);
    }
}
