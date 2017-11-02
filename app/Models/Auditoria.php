<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codPlanF';
    protected $table = 'auditoria';

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
