<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimientosp extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codProSP';
    protected $table = 'procedimiento_sp';

    public function subProceso()
    {
        return $this->belongsTo(Subproceso::class, 'codSubPro');
    }
}
