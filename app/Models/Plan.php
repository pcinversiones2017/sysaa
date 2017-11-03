<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT  = 'fecha_eliminado';


    protected $primaryKey = 'codPlanA';
    protected $table = 'plan_anual';

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($plan){
            $plan->auditorias()->delete();
        });
    }

    public function scopeActivo($sql)
    {
        return $sql->where('eliminado', false);
    }

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class, 'codPlanA');
    }
}
