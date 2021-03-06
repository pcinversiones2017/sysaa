<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cargofuncional extends Model
{
	const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA = 'CARGO FUNCIONAL';

    protected $table = "cargo_funcional";

    protected $fillable =  ['nombre'];

    public function scopeActivo($cadenaSQL)
    {
        return $cadenaSQL->where('eliminado',true);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codCarFun',$id);
    }

    public function setNombresAttribute($value)
    {
        $this->attributes['nombre'] = Str::upper(trim($value));
    }
}
