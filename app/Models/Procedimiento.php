<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = "procedimiento";
    protected $primaryKey = 'codProc';

    protected $fillable = ['justificacion', 'detalle', 'fechafin', 'codObjEsp','codObjGen','codUsuRol','eliminado'];

    const CREATED_AT = "fecha_creado";
    const UPDATED_AT = "fecha_modificado";
    const TABLA = 'PROCEDIMIENTO';

    public function scopeActivo($cadenaSQL)
    {
        return $cadenaSQL->where('eliminado',false);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codProc',$id);
    }

    public function codusurol()
    {
        return $this->hasOne(Usuariorol::class,'codUsuRol','codUsuRol');
    }

    public function objetivoespecifico()
    {
        return $this->hasOne(ObjetivoEspecifico::class, 'codObjEsp', 'codObjEsp');
    }

    public function desarrollo()
    {
        return $this->hasOne(Desarrollo::class,'codProc','codProc');
    }

}
