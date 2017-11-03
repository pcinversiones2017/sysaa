<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Macroproceso extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA 	 = 'MACROPROCESO';
    const DELETED_AT  = 'fecha_eliminado';

    protected $primaryKey = 'codMacroP';
    protected $table = 'macroproceso';


    public static function eliminar($codMacroP)
    {
        $macroproceso = self::find($codMacroP);
        $macroproceso->eliminado = Macroproceso::ELIMINADO;
        $macroproceso->save();
    }
    public function scopeActivo($sql)
    {
        return $sql->where('eliminado', false);
    }
    public function procesoMA()
    {
        return $this->hasMany(Procesoma::class, 'codMacroP');
    }


}
