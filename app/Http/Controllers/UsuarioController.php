<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Usuario\RegistroRequest;
use App\Http\Requests\Usuario\ActualizarRequest;
use App\User;
use Alert;

class UsuarioController extends Controller
{
    public function listar()
    {
    	$usuarios = User::Activo()->get();
    	return view('usuario.listar', compact('usuarios'));
    }

    public function crear()
    {
    	return view('usuario.crear');
    }

    public function registrar(Request $request)
    {
    	User::create([	
    					'nombres' => $request->nombres, 
    					'paterno' => $request->paterno, 
    					'materno' => $request->materno,
    					'email' => $request->email, 
    					'password' => bcrypt($request->password)
    				]);
    	return redirect()->route('usuario.listar')->with('success','Usuario registrado');
    }

    public function editar($id)
    {
    	$usuario = User::Existe($id)->get();
    	return view('usuario.editar', compact('usuario'));
    }

    public function actualizar(ActualizarRequest $request)
    {
    	if($request->has('password'))
    	{
    		User::Existe($request->id)->update(['nombres' => $request->nombres, 'paterno' => $request->paterno, 'materno' => $request->materno,'email' => $request->email, 'password' => bcrypt($request->password)]);
    		return redirect()->route('usuario.listar')->with('success','Usuario actualizado');	
    	}else 
    	{
    		User::Existe($request->id)->update(['nombres' => $request->nombres, 'paterno' => $request->paterno, 'materno' => $request->materno,'email' => $request->email]);
    		return redirect()->route('usuario.listar')->with('success','Usuario actualizado');	
    	}
    	
    }

    public function eliminar($id)
    {
    	User::Existe($id)->update(['estado' => false]);
    	return redirect()->route('usuario.listar')->with('danger','Usuario eliminado');
    }
}
