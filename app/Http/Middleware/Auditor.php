<?php

namespace App\Http\Middleware;

use App\Models\Rol;
use Closure;
use Auth;
use App\User;

class Auditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $total = User::join('usuario_roles','usuario_roles.codUsu','=','users.codUsu')
            ->join('roles','roles.codRol','=','usuario_roles.codRol')
            ->where('roles.codRol', Rol::INTEGRANTE)
            ->where('users.codUsu', Auth::user()->codUsu)
            ->count();

        if(Auth::check() && $total == 1)
        {
            return $next($request);
        }else 
        {
            Auth::logout();
            return redirect('login');
        }
        
    }
}
