<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subproceso extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT  = 'fecha_eliminado';
    const TABLA     = 'SUBPROCESO';

    protected $primaryKey = 'codSubPro';
    protected $table = 'subproceso';

    public function procesoMA()
    {
        return $this->belongsTo(Procesoma::class,'codProMA');
    }
    public function procedimientoSP()
    {
        return $this->hasMany(Procedimientosp::class,'codSubPro');
    }
    public static function eliminar($codSubPro)
    {
        $subproceso = self::find($codSubPro);
        $subproceso->eliminado = Procesoma::ELIMINADO;
        $subproceso->save();
    }
}
