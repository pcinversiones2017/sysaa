<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Login\ValidarRequest;
use App\Models\Usuariorol;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/test';

    public function login(){

        return view('login.login');
    }

    public function authenticate(ValidarRequest $request)
    {
    	$UsuarioExiste = User::ExisteEmail($request->email)->count();
    	if($UsuarioExiste == 1)
    	{
    		$Usuario = User::ExisteEmail($request->email)->get();
    		foreach($Usuario as $row):
    			$ObtenerID = $row->codUsu;
    		endforeach;
    		$ValidarUsuario = Usuariorol::Validar($ObtenerID)->count(); 
    		if($ValidarUsuario == 1)
    		{
    			if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
		    	{
                    RegistrarActividad('LOGIN','INICIO SESION','acaba de iniciar sesion');
		    		return redirect('/');
		    	}else 
		    	{
		    		return back()->with('danger','No se ha podido iniciar sesion.');
		    	}
    		}else 
    		{
    			return back()->with('danger','Usuario sin rol y cargo asignado.');
    		}
    	}else 
    	{
    		return back()->with('danger','Usuario ingresado no existe.');
    	}
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
