<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivo extends Model
{
    use SoftDeletes;

    protected $table = "archivos";

    protected $fillable = ['nombre', 'ruta', 'codInf'];
    
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';
    const TABLA      'ARCHIVO';

    public function scopeExiste($cadenaSQL, $id)
    {
    	return $cadenaSQL->where('codArc',$id);
    }

    public function scopeInforme($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codInf', $id);
    }
}
