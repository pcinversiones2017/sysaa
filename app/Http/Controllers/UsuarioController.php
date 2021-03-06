<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\Usuario\ValidarRequest;
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
        $usuario = 'active';
        RegistrarActividad(User::TABLA,Historial::LEER,'vió el listado de Usuarios');
    	return view('usuario.listar', compact('usuarios', 'usuario'));
    }

    public function crear()
    {
        RegistrarActividad(User::TABLA,Historial::CREAR,'vió el formulario de crear Usuario');
    	return view('usuario.crear');
    }

    public function registrar(RegistroRequest $request)
    {

    	$persona = new Persona();
    	$persona->nombres = $request->nombres;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->email = $request->email;
        $persona->save();

        RegistrarActividad(User::TABLA,Historial::REGISTRAR,'registró el Usuario ' . $request->nombre);
    	return redirect()->route('usuario.listar')->with('success','Usuario registrado');
    }

    public function editar($id)
    {
    	$usuario = User::find($id);
        $activoEditar = 'active';
        RegistrarActividad(User::TABLA,Historial::EDITAR,'vió el formulario de editar el Usuario '.$usuario->nombres);
    	return view('usuario.editar', compact(['usuario', 'activoEditar']));
    }

    public function actualizar(ActualizarRequest $request)
    {

    	if($request->has('password'))
    	{
    		User::Existe($request->codUsu)->update(['password' => bcrypt($request->password)]);
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

    public function cambiar(ValidarRequest $request)
    {
        User::existe($request->codUsu)->update(['password' => bcrypt($request->password)]);
        Auth::logout();
        return redirect('login');
    }
}
