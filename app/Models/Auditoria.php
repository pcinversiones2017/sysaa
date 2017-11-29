<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function normativas()
    {
        return $this->hasMany(Normativa::class, 'codPlanF');
    }

    public function estado()
    {
        return $this->hasOne(EstadoAuditoria::class, 'codEstAud', 'codEstAud');
    }

    public function informe()
    {
        return $this->hasOne(Informe::class, 'codPlanF', 'codPlanF');
    }

    public function comision()
    {
        return $this->hasMany(Usuariorol::class, 'codPlanF');
    }

    public function getPeriodoIniPlanFAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getPeriodoFinPlanFAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
