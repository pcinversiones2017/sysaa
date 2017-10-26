<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Normativac extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codNorm';
    protected $table = 'normativa_c';

    public function tipoNormativa()
    {
        return $this->belongsTo(TipoNormativa::class, 'codTipNorm');
    }

}
