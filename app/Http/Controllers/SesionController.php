<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Login\ValidarRequest;
use App\Models\Usuariorol;
use App\User;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{

    public function iniciarsesion()
    {
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
		    		return redirect()->intended('/');
		    	}else 
		    	{
		    		return back()->with('danger','Contraseña Incorrecta.');
		    	}
    		}else 
    		{
    			return back()->with('danger','Usuario sin rol y sin cargo asignado.');
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

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
