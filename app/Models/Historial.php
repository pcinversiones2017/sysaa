<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = "historial";

    protected $fillable =  ['codUsu', 'tabla', 'accion', 'mensaje'];

    const CREATED_AT = "fecha_creado";
    const UPDATED_AT = "fecha_modificado";
    const LEER 		 = "LEER";
    const CREAR 	 = "CREAR";
    const REGISTRAR  = "REGISTRAR";
    const EDITAR 	 = "EDITAR";
    const ACTUALIZAR = "ACTUALIZAR";
    const ELIMINAR 	 = "ELIMINAR";
    const INICIAR_SESION   = "INICIO SESION";
    const CERRAR_SESION   = "CERRO SESION";

    public function scopeMostrar($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codUsu', $id);
    }

}
