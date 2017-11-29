<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Observacion extends Model
{
    use SoftDeletes;

    protected $table = 'observacion';
    protected $fillable = ['titulo', 'descripcion', 'recomendacion','codDes'];
    protected $primaryKey = 'codObs';

    const TABLA 	 = 'OBSERVACION';
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codObs',$id);
    }

    public function scopeDesarrollo($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codDes', $id);
    }

    public function desarrollo()
    {
        return $this->hasOne(Desarrollo::class, 'codDes', 'codDes');
    }

    public function seguimiento()
    {
        return $this->hasMany(Seguimiento::class, 'codObs', 'codObs');
    }


}
