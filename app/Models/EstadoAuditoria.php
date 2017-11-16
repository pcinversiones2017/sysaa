<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 15/11/17
 * Time: 11:02 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EstadoAuditoria extends Model
{
    protected $primaryKey = 'codEstAud';
    protected $table = 'estado_auditoria';

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';

    const PENDIENTE = 1;
    const PENDIENTE_APROBACION = 2;
    const EN_PROCESO = 3;
    const FINALIZADO = 4;
}