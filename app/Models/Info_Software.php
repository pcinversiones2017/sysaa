<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info_Software extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    protected $primaryKey = 'cod_soft';
    protected $table = 'Info_Software';

}
