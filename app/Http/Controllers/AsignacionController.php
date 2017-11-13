<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plan\RegistroRequest;
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


        $usuarios = User::all()->except($usuarios);
        $usuario = $usuarios->map(function($user){
            $usuarioRol = UsuarioRol::where('codUsu', $user->codUsu)->get();

            if($usuarioRol->isNotEmpty()){
                $user->activo = true;
                return $user;
            }
            return $user;
        });

        RegistrarActividad(UsuarioRol::TABLA,Historial::CREAR,'vió el formulario de cargar Asignacion de Rol y Cargo');

    	return view('asignacion.crear', compact(['rol', 'usuario', 'codPlanF']));
    }

    public function registrar(Request $request)
    {
    	$usuarioRol = UsuarioRol::where('codUsu', $request->usuario)->get();
    	$animate = '#asignacion';

    	if($usuarioRol->isEmpty()){
    	    $activo = 1;
        }else{
    	    $activo = 0;
        }

        $usuarioRol  = new UsuarioRol();
        $usuarioRol->codUsu     = $request->codUsu;
        $usuarioRol->codRol     = $request->rol;
        $usuarioRol->codCarFun  = 2;
        $usuarioRol->codPlanF   = $request->codPlanF;
        $usuarioRol->horasH     = $request->horasH;
        $usuarioRol->activo     = $activo;
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
