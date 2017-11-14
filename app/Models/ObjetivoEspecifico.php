<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 17:52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ObjetivoEspecifico extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';
    const TABLA = 'OBJETIVO ESPECIFICO';

    protected $primaryKey = 'codObjEsp';
    protected $table = 'objetivo_especifico';

    public function macroproceso()
    {
        return $this->belongsTo(Macroproceso::class, 'codMacroP');
    }

    public function objetivoGeneral()
    {
        return $this->belongsTo(ObjetivoGeneral::class, 'codObjGen');
    }
    public function procedimientos()
    {
        return $this->hasMany(procedimiento::class, 'codObjEsp');
    }
}