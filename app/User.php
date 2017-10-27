<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "usuarios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'paterno','materno','email', 'password',
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
        return $cadenaSQL->where('id',$id);
    }

    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = Str::upper($value);
    }

    public function setPaternoAttribute($value)
    {
        $this->attributes['paterno'] = Str::upper($value);
    }

    public function setMaternoAttribute($value)
    {
        $this->attributes['materno'] = Str::upper($value);
    }

    public function getDatosAttribute()
    {
        return $this->attributes['nombres'].' '.$this->attributes['paterno'].' '.$this->attributes['materno'];
    }
}
