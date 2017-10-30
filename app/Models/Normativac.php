<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Normativac extends Model
{
    use Notifiable;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $primaryKey = 'codNorm';
    protected $table = 'normativa_c';

    /*
    protected $fillable = [
        'tipoNormativa', 'nombre','numero','fecha', 'codTipNorm'];
*/

}
