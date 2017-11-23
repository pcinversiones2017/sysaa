<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $table = "procedimiento";
    protected $primaryKey = 'codProc';

    protected $fillable = ['justificacion', 'detalle', 'fecha_fin', 'codObjEsp','codObjGen','codUsuRol','eliminado', 'fecha_terminado', 'codEst'];

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

    public function scopeAsignado($cadenaSQL)
    {
        return $cadenaSQL->where('codEst',1);
    }

    public function scopePendiente($cadenaSQL)
    {
        return $cadenaSQL->where('codEst',2);
    }

    public function scopeFinalizado($cadenaSQL)
    {
        return $cadenaSQL->where('codEst',3);
    }

    public function scopeAprobado($cadenaSQL)
    {
        return $cadenaSQL->where('codEst',4);
    }

    public function scopeRechazado($cadenaSQL)
    {
        return $cadenaSQL->where('codEst',5);
    }

    public function codusurol()
    {
        return $this->hasOne(Usuariorol::class,'codUsuRol','codUsuRol');
    }

    public function objetivoespecifico()
    {
        return $this->hasOne(ObjetivoEspecifico::class, 'codObjEsp', 'codObjEsp');
    }

    public function objetivogeneral()
    {
        return $this->hasOne(ObjetivoGeneral::class, 'codObjGen', 'codObjGen');
    }

    public function desarrollo()
    {
        return $this->belongsTo(Desarrollo::class,'codProc','codProc');
    }

}
