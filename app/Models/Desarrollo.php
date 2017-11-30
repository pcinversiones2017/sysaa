<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desarrollo extends Model
{
    use SoftDeletes;

    protected $table = 'desarrollo';
    protected $primaryKey = "codDes";
    protected $fillable = ['informe','elaborado','revisado','supervisado','codProc'];

    const CREATED_AT = "fecha_creado";
    const UPDATED_AT = "fecha_modificado";
    const DELETED_AT = "fecha_eliminado";

    const TABLA = 'DESARROLLO';

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codDes',$id);
    }

    public function procedimiento()
    {
        return $this->belongsTo(Procedimiento::class,'codProc','codProc');
    }

    public function observacion()
    {
        return $this->hasMany(Observacion::class, 'codDes', 'codDes');
    }
}
