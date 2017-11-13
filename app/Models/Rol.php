<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";

    protected $fillable = ['nombre'];

    const CREATED_AT = "fecha_creado";
    const UPDATED_AT = "fecha_modificado";

    
    const JEFE_OCI = 1;
    const JEFE_DE_COMISION = 2;
    const INTEGRANTE = 4;
    const SUPERVISOR = 3;
}
