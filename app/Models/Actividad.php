<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT  = 'fecha_eliminado';
    const TABLA     = 'ACTIVIDAD';


    protected $primaryKey = 'codAct';
    protected $table = 'actividad';

    public function procedimientoSP()
    {
        return $this->belongsTo(Procedimientosp::class, 'codProSP');
    }
    public static function eliminar($codAct)
    {
        $actividad = self::find($codAct);
        $actividad->eliminado = Actividad::ELIMINADO;
        $actividad->save();
    }
}
