<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "log";

    const CREATED_AT = "fecha_creado";
    const UPDATED_AT = "fecha_modificado";

    protected $fillable =  ['codUsu', 'tabla', 'accion', 'mensaje'];
}
