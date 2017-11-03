<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 16:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjetivoGeneral extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';

    protected $primaryKey = 'codObjGen';
    protected $table = 'objetivo_general';

    public function objetivosEspecificos()
    {
        return $this->hasMany(ObjetivoEspecifico::class, 'codObjGen');
    }

    public function auditoria()
    {
        return $this->hasOne(Auditoria::class, 'codPlanF');
    }
}