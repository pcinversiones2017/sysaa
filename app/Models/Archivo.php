<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivo extends Model
{
    use SoftDeletes;

    protected $table = "archivos";

    protected $fillable = ['nombre', 'ruta', 'codDes', 'codObs', 'codSeg'];
    
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';
    const TABLA   =   'ARCHIVO';

    protected $primaryKey = 'codArc';

    public function scopeExiste($cadenaSQL, $id)
    {
    	return $cadenaSQL->where('codArc',$id);
    }

    public function scopeProcedimiento($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codDes', $id);
    }

    public function scopeDesarrollo($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codObs', $id);
    }

    public function scopeSeguimiento($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codSeg', $id);
    }
}
