<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';
    const DELETED_AT = 'fecha_eliminado';

    protected $primaryKey = 'codUsu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'paterno','materno','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeExiste($cadenaSQL, $id)
    {
        return $cadenaSQL->where('codUsu',$id);
    }

    public function scopeExisteEmail($cadenaSQL, $email)
    {
        return $cadenaSQL->where('email',$email);
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

    public function usuariorol()
    {
        return $this->hasOne(Models\UsuarioRol::class,'codUsu','codUsu');
    }
}
