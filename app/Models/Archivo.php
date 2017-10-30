<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = "archivo";

    public function scopeActivo($cadenaSQL)
    {
    	return $cadenaSQL->where('estado', true);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
    	return $cadenaSQL->where('codArc',$id);
    }
}
