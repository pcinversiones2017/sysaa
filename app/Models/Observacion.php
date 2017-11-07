<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observacion';
    protected $fillable = [''];
    protected $primaryKey = 'codObs';

    const TABLA 	 = 'OBSERVACION';
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
}
