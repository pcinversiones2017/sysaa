<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjetivoGeneral extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';
    const TABLA = 'OBJETIVO GENERAL';

    protected $primaryKey = 'codObjGen';
    protected $table = 'objetivo_general';

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($objetivoGeneral){
            $objetivoGeneral->objetivosEspecificos()->delete();
        });
    }

    public function scopeAuditoria($cadenaSQL, $codPlanF)
    {
        return $cadenaSQL->where('codPlanF', $codPlanF);
    }

    public function objetivosEspecificos()
    {
        return $this->hasMany(ObjetivoEspecifico::class, 'codObjGen');
    }

    public function procedimientos()
    {
        return $this->hasMany(Procedimiento::class, 'codObjGen');
    }

    public function auditoria()
    {
        return $this->hasOne(Auditoria::class, 'codPlanF');
    }
}