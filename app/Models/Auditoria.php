<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const ELIMINADO = 1;

    protected $primaryKey = 'codPlanF';
    protected $table = 'auditoria';

    public function scopeActivo($sql)
    {
        return $sql->where('eliminado', false);
    }

    public function eliminar($codPlanF)
    {
        $auditoria = self::find($codPlanF);
        $auditoria->eliminar = self::ELIMINADO;
        $auditoria->save();
    }

    public function planAnual()
    {
        return $this->belongsTo(Plan::class, 'codPlanA');
    }

    public function objetivoGeneral()
    {
        return $this->hasOne(ObjetivoGeneral::class, 'codPlanF');
    }

    public function cronogramaGeneral()
    {
            return $this->hasMany(Cronograma::class, 'codPlanF');
    }

    public function macroprocesos()
    {
        return $this->hasMany(Macroproceso::class, 'codPlanF');
    }
}
