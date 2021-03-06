<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuariorol extends Model
{
    protected $table = 'usuario_roles';
    protected $primaryKey = 'codUsuRol';

    protected $fillable = ['codUsu','codRol','codCarFun', 'codPlanF'];

    const CREATED_AT = "fecha_creado";

    const UPDATED_AT = "fecha_modificado";
    const TABLA = 'ASIGNACION DE ROL Y CARGO';

    public function scopeActivo($cadenaSQL)
    {
        return $cadenaSQL->where('estado',true);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codUsuRol',$id);
    }

    public function scopeValidar($cadenaSQL, $codUsu)
    {
        return $cadenaSQL->where('codUsu',$codUsu);
    }

    public function rol()
    {
    	return $this->hasOne(Rol::class,'codRol','codRol');
    }

    public function usuario()
    {
    	return $this->belongsTo(\App\User::class,'codUsu','codUsu');
    }

    public function cargofuncional($value='')
    {
    	return  $this->hasOne(Cargofuncional::class,'codCarFun','codCarFun');
    }

    public function auditoria()
    {
        return $this->belongsTo(Auditoria::class, 'codPlanF');
    }
}
