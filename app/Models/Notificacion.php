<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificacion';
    protected $fillable = ['remitente', 'destinatario', 'codProc', 'mensaje'];

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
}
