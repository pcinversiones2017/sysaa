<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procesoma extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codProMA';
    protected $table = 'proceso_ma';

    public function macroProceso()
    {
        return $this->belongsTo(Macroproceso::class,'codMacroP');
    }
    public function subProceso()
    {
        return $this->hasMany(Subproceso::class,'codProMA');
    }

}
