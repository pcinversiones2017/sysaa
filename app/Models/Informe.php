<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = "informe";

    protected $fillable = ['informe','elaborado','revisado','supervisado','codProc','eliminado'];

    const CREATED_AT = "fecha_creado";

    const UPDATED_AT = "fecha_modificado";

    public function scopeExiste($cadenaSQL, $id)
    {
    	return $cadenaSQL->where('codInf',$id);
    }

    public function scopeActivo($cadenaSQL, $id)
    {
        return $cadenaSQL->where('eliminado', false);
    }

    public function procedimiento()
    {
    	return $this->hasOne(Procedimiento::class,'codProc','codProc');
    }
}
