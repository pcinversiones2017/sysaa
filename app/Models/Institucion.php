<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA = 'INSTITUCION';

    protected $primaryKey = 'codInstitucion';
    protected $table = 'institucion';
}
