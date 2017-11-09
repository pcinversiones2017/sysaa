<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class JefeComision
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
            ->where('roles.nombre','JEFE DE COMISION')
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
