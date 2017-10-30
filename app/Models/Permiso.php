<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos";

    protected $fillable = ['tabla', 'idusuario', 'leer', 'crear', 'editar', 'eliminar'];

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
}
