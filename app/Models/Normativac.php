<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Normativa extends Model
{
    use Notifiable;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const TABLA = 'NORMATIVA';

    protected $primaryKey = 'codNorm';
    protected $table = 'normativa';

    /*
    protected $fillable = [
        'tipoNormativa', 'nombre','numero','fecha', 'codTipNorm'];
*/

    public function macroproceso()
    {
        return $this->hasOne(Macroproceso::class, 'codMacroP');
    }

}
