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
        return $this->hasOne(Plan::class, 'codPlanA');
    }
}
