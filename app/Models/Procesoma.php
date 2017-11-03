<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Procesoma extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT  = 'fecha_eliminado';

    protected $primaryKey = 'codProMA';
    protected $table = 'proceso_ma';

    public static function eliminar($codProMA)
    {
        $procesoma = self::find($codProMA);
        $procesoma->eliminado = Procesoma::ELIMINADO;
        $procesoma->save();
    }
    public function scopeActivo($sql)
    {
        return $sql->where('eliminado', false);
    }
    public function macroProceso()
    {
        return $this->belongsTo(Macroproceso::class,'codMacroP');
    }
    public function subProceso()
    {
        return $this->hasMany(Subproceso::class,'codProMA');
    }

}
