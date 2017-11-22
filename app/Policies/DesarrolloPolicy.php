<?php

namespace App\Policies;

use App\Models\Procedimiento;
use App\User;
use App\Models\Desarrollo;
use Illuminate\Auth\Access\HandlesAuthorization;

class DesarrolloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the desarrollo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Desarrollo  $desarrollo
     * @return mixed
     */
    public function view(User $user, Desarrollo $desarrollo)
    {
        //
    }

    /**
     * Determine whether the user can create desarrollos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Desarrollo $desarrollo)
    {
        return false;
    }



    /**
     * Determine whether the user can update the desarrollo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Desarrollo  $desarrollo
     * @return mixed
     */
    public function update(User $user, Desarrollo $desarrollo)
    {
        //
    }

    /**
     * Determine whether the user can delete the desarrollo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Desarrollo  $desarrollo
     * @return mixed
     */
    public function delete(User $user, Desarrollo $desarrollo)
    {
        //
    }
}
