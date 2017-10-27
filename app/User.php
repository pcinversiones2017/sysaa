<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $table = "usuarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'paterno','materno','email', 'password','estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeActivo($cadenaSQL)
    {
        return $cadenaSQL->where('estado',true);
    }

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codUsu',$id);
    }

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
        return $this->attributes['nombres'].' '.$this->attributes['paterno'].' '.$this->attributes['materno'];
    }
}
