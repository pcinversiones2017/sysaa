<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimientosp extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT  = 'fecha_eliminado';
    const TABLA = 'PROCEDIMIENTO DEL SUBPROCESO';

    protected $primaryKey = 'codProSP';
    protected $table = 'procedimiento_sp';

    public function subProceso()
    {
        return $this->belongsTo(Subproceso::class,'codSubPro');
    }
    public function actividadeS()
    {
        return $this->hasMany(Actividad::class,'codProSP');
    }
    public static function eliminar($codProSP)
    {
        $procedimientosp = self::find($codProSP);
        $procedimientosp->eliminado = Procedimientosp::ELIMINADO;
        $procedimientosp->save();
    }
}
