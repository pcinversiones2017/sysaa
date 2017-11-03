<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auditoria extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';
    const TABLA  = "AUDITORIA";

    protected $primaryKey = 'codPlanF';
    protected $table = 'auditoria';


    public static function boot()
    {
        parent::boot();
        static::deleted(function ($auditoria){
            $auditoria->objetivoGeneral()->delete();
        });
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
