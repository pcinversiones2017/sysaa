<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    protected $primaryKey = 'codEtp';
    protected $table = 'etapa';
}
