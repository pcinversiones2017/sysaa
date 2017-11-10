<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoNormativa extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA = 'TIPO DE NORMATIVA';
    const APLICABLE = 1;
    const REGULA = 2;

    protected $primaryKey = 'codTipNorm';
    protected $table = 'tipo_normativa';
}
