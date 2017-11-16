<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 15/11/17
 * Time: 04:24 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Persona extends Model
{

    protected $table        = 'personas';
    protected $primaryKey   = 'codPer';

    const TABLA      = 'persona';
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';


    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = Str::upper(trim($value));
    }

    public function setPaternoAttribute($value)
    {
        $this->attributes['paterno'] = Str::upper(trim($value));
    }

    public function setMaternoAttribute($value)
    {
        $this->attributes['materno'] = Str::upper(trim($value));
    }

    public function getDatosAttribute()
    {
        return $this->persona->nombres . ' ' . $this->persona->paterno . ' ' . $this->persona->materno;
    }


}