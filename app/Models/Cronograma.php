<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA = 'CRONOGRAMA';

    protected $primaryKey = 'codCroGen';
    protected $table = 'cronograma_general';

    public function etapa()
    {
        return $this->belongsTo(Etapa::class, 'codEtp');
    }

    public function getFechaIniAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getFechaFinAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
