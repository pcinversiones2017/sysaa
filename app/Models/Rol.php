<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
}
