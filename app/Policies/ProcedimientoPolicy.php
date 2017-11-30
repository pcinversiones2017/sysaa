<?php

namespace App\Policies;

use App\User;
use App\Models\Procedimiento;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcedimientoPolicy
{
    use HandlesAuthorization;


    public function crearDesarrollo(User $user, Procedimiento $procedimiento)
    {
        return $user->codUsu === $procedimiento->codusurol->codUsu;
    }

    public function mostrar(User $user, Procedimiento $procedimiento)
    {
        return $user->codUsu === $procedimiento->codusurol->codUsu;
    }
}
