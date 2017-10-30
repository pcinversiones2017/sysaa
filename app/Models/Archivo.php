<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = "archivos";

    protected $fillable = ['nombre'];
    
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    public function scopeActivo($cadenaSQL)
    {
    	return $cadenaSQL->where('estado', true);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
    	return $cadenaSQL->where('codArc',$id);
    }
}
