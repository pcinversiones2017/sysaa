<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Macroproceso extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codMacroP';
    protected $table = 'macroproceso';
}
