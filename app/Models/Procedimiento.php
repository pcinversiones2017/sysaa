<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = "procedimiento";

    protected $fillable = ['justificacion', 'detalle', 'fechafin', 'codObjEsp','codObjGen','codUsuRol'];

    const CREATED_AT = "fecha_creado";
    const UPDATED_AT = "fecha_modificado";

    public function scopeActivo($cadenaSQL)
    {
        return $cadenaSQL->where('estado',true);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codProc',$id);
    }

    public function codusurol()
    {
        return $this->hasOne(Usuariorol::class,'codUsuRol','codUsuRol');
    }

}
