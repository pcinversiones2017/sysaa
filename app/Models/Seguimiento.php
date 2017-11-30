<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimiento extends Model
{
    use SoftDeletes;

    protected $table = 'seguimiento';
    protected $fillable = ['codObs', 'acciones', 'evaluacion', 'estado'];

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';
    const TABLA  = "AUDITORIA";

    protected $primaryKey = 'codSeg';
    
    public function observacion()
    {
    	return $this->belongsTo(Observacion::class, 'codObs', 'codObs');
    }

}
