<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plan\RegistroRequest;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\UsuarioRol;
use App\Models\Cargofuncional;
use App\User;
use App\Models\Rol;
use App\Models\Historial;
use Auth;

class AsignacionController extends Controller
{
    public function listar()
    {
    	$usuariorol = Usuariorol::all()->with(['usuario','cargofuncional','rol'])->get();
        RegistrarActividad(UsuarioRol::TABLA,Historial::LEER,'vió el listado de Asignacion de Rol y Cargo');
    	return view('asignacion.listar', compact('usuariorol'));
    }

    public function crear(Request $request)
    {

        $codPlanF = $request->codPlanF;

        $usuariosRol = UsuarioRol::where('codPlanF', $codPlanF)->pluck('codUsu', 'codRol')->toArray();
        $usuarios = array_values($usuariosRol);
        $roles = array_keys($usuariosRol);
        foreach ($roles as $rol){
            if($rol == Rol::JEFE_DE_COMISION || $rol == Rol::SUPERVISOR){
                 $rolesAsignados[] = $rol;
            }
        }
        $rolesAsignados[] = Rol::JEFE_OCI;
        $rol = rol::pluck('nombre','codRol')->except($rolesAsignados);

        $personasAsignadas = [];
        foreach ($usuarios as $codUsu){
            $usuario = User::find($codUsu);
            $personasAsignadas[] = $usuario->persona->codPer;
        }

        $personas = Persona::all()->except($personasAsignadas);
        $personas = $personas->map(function($person){
            $person->usuario = $person->nombres[0] . $person->paterno . date('hi');
            return $person;
        });



        RegistrarActividad(UsuarioRol::TABLA,Historial::CREAR,'vió el formulario de cargar Asignacion de Rol y Cargo');

    	return view('asignacion.crear', compact(['rol', 'usuario', 'codPlanF', 'personas']));
    }

    public function registrar(Request $request)
    {

    	list($codPer, $usuario) = explode('-', $request->codPer);

    	$user = new User();
    	$user->username = $usuario;
    	$user->password = bcrypt('123456');
    	$user->codPer = $codPer;
    	$user->save();

    	$animate = '#asignacion';

        $usuarioRol  = new UsuarioRol();
        $usuarioRol->codUsu     = $user->codUsu;
        $usuarioRol->codRol     = $request->rol;
        $usuarioRol->codCarFun  = 2;
        $usuarioRol->codPlanF   = $request->codPlanF;
        $usuarioRol->horasH     = $request->horasH;
        $usuarioRol->sueldo     = $request->sueldo;
        $usuarioRol->save();

        RegistrarActividad(UsuarioRol::TABLA,Historial::REGISTRAR,'registró la Asignacion de Rol y Cargo '.$request->nombre);

    	return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success','Usuario asignado registrado')->with('animate', $animate);
    }

    public function editar(Request $request)
    {

        $usuarioRol = UsuarioRol::find($request->codUsuRol);
        $codPlanF = $usuarioRol->codPlanF;
        $usuariosRol = UsuarioRol::where('codPlanF', $codPlanF)->pluck('codUsu', 'codRol')->toArray();
        $usuarios = array_values($usuariosRol);
        $roles = array_keys($usuariosRol);
        foreach ($roles as $rol){
            if($rol == Rol::JEFE_DE_COMISION || $rol == Rol::SUPERVISOR){
                $rolesAsignados[] = $rol;
            }
        }
        $rolesAsignados[] = Rol::JEFE_OCI;
        $rol = rol::pluck('nombre','codRol')->except($rolesAsignados);

        $usuario = User::find($usuarioRol->codUsu);

        //RegistrarActividad(UsuarioRol::TABLA,Historial::EDITAR,'vió el formulario de editar la Asignacion de Rol y Cargo '.$actividad->nombre);
    	return view('asignacion.editar', compact(['usuarioRol','usuario','rol']));
    }

    public function actualizar(Request $request)
    {
    	$usuarioRol = UsuarioRol::find($request->codUsuRol);

        $usuarioRol->codRol     = $request->rol;
        $usuarioRol->horasH     = $request->horasH;
        $usuarioRol->sueldo     = $request->sueldo;
        $usuarioRol->save();
        RegistrarActividad(UsuarioRol::TABLA,Historial::ACTUALIZAR,'actualizó la Asignacion de Rol y Cargo de '. $request->nombre);

    	return redirect()->route('auditoria.mostrar', $usuarioRol->codPlanF)->with(['success' => 'Usuario asignado actualizado', 'animate' => '#asignacion']);
    }

    public function eliminar($codUsuRol)
    {
    	$usuarioRol = UsuarioRol::find($codUsuRol);
    	$usuarioRol->delete();
    	RegistrarActividad(UsuarioRol::TABLA,Historial::ELIMINAR,'eliminó la Asignacion de Rol y Cargo ' . $usuarioRol->codUsu);
    	return redirect()->route('auditoria.mostrar', $usuarioRol->codPlanF)->with(['danger' => 'Usuario asignado eliminado', 'animate' => '#asignacion']);
    }
}
