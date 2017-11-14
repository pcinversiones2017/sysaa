<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 14/11/17
 * Time: 04:24 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FechaEtapa extends Model
{
    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codFecEta';
    protected $table = 'fecha_etapa';
}