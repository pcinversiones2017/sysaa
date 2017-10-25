<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 17:52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ObjtivoEspecifico extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codObjEsp';
    protected $table = 'objetivo_especifico';
}