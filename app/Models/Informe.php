<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = "informe";

    protected $fillable = ['informe','elaborado','revisado','supervisado','codProc'];

    const CREATED_AT = "fecha_creado";

    const UPDATED_AT = "fecha_modificado";

    public function scopeExiste($cadenaSQL, $id)
    {
    	return $cadenaSQL->where('codProc',$id);
    }

    public function procedimiento()
    {
    	return $this->hasOne(Procedimiento::class,'codProc','codProc');
    }
}
