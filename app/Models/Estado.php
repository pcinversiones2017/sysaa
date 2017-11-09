<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table  = 'estado';

    const NUEVO = 1;
    const PENDIENTE = 2;
    const TERMINADO = 3;
    const APROBADO = 4;
    const RECHAZADO = 5;
}
