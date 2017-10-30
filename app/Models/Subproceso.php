<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subproceso extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codSubPro';
    protected $table = 'subproceso';

    public function procesoMA()
    {
        return $this->belongsTo(Procesoma::class,'codProMA');
    }
    public function procedimientoSP()
    {
        return $this->hasMany(Procedimientosp::class,'codSubPro');
    }
}
