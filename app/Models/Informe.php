<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Informe extends Model
{
    use SoftDeletes;

    protected $table = "informe";

    protected $fillable = ['informe','elaborado','revisado','supervisado','codProc','eliminado'];

    const CREATED_AT = "fecha_creado";

    const UPDATED_AT = "fecha_modificado";

    const DELETED_AT = "fecha_eliminado";

    const TABLA = 'INFORME';

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
