<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 16:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ObjetivoGeneral extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codObjGen';
    protected $table = 'objetivo_general';

    public function objetivosEspecificos()
    {
        return $this->hasMany(ObjetivoEspecifico::class, 'codObjGen');
    }
}