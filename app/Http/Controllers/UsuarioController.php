<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Usuario\RegistroRequest;
use App\Http\Requests\Usuario\ActualizarRequest;
use App\User;
use App\Models\Historial;
use Auth;

class UsuarioController extends Controller
{
    public function listar()
    {
    	$usuarios = User::all();
        RegistrarActividad(User::TABLA,Historial::LEER,'vió el listado de Usuarios');
    	return view('usuario.listar', compact('usuarios'));
    }

    public function crear()
    {
        RegistrarActividad(User::TABLA,Historial::CREAR,'vió el formulario de crear Usuario');
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
        RegistrarActividad(User::TABLA,Historial::REGISTRAR,'registró el Usuario '.$request->nombre);
    	return redirect()->route('usuario.listar')->with('success','Usuario registrado');
    }

    public function editar($id)
    {
    	$usuario = User::Existe($id)->get();
        RegistrarActividad(User::TABLA,Historial::EDITAR,'vió el formulario de editar el Usuario '.$actividad->nombre);
    	return view('usuario.editar', compact('usuario'));
    }

    public function actualizar(ActualizarRequest $request)
    {
    	if($request->has('password'))
    	{
    		User::Existe($request->id)->update(['nombres' => $request->nombres, 'paterno' => $request->paterno, 'materno' => $request->materno,'email' => $request->email, 'password' => bcrypt($request->password)]);
            RegistrarActividad(User::TABLA,Historial::ACTUALIZAR,'actualizó el Usuario '.$request->nombre);
    		return redirect()->route('usuario.listar')->with('success','Usuario actualizado');	
    	}else 
    	{
    		User::Existe($request->id)->update(['nombres' => $request->nombres, 'paterno' => $request->paterno, 'materno' => $request->materno,'email' => $request->email]);
            RegistrarActividad(User::TABLA,Historial::ACTUALIZAR,'actualizó el Usuario '.$request->nombre);
    		return redirect()->route('usuario.listar')->with('success','Usuario actualizado');	
    	}
    	
    }

    public function eliminar($id)
    {
    	$usuario = User::find($id);
        $usuario->delete();
        RegistrarActividad(User::TABLA,Historial::ELIMINAR,'eliminó el Usuario '.$usuario->nombre);
    	return redirect()->route('usuario.listar')->with('danger','Usuario eliminado');
    }
}
