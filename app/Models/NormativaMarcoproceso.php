<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class NormativaMarcoproceso extends Model
{

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA  = 'NORMATIVA DE MACROPROCESO';

    protected $primaryKey = 'codNormMacro';
    protected $table = 'normativa_macroproceso';

    protected $fillable = ['nombre_archivo'];

    public function Macroproceso()
    {
        return $this->hasOne(Macroproceso::class,'codMacroP','codMacroP');

    }

    public function Normativac()
    {
        return $this->hasOne(Normativac::class,'codNorm','codNorm');

    }


}
