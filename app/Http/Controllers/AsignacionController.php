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
        $rol = rol::pluck('nombre','codRol');

        $codPlanF = $request->codPlanF;
        $usuariosRol = UsuarioRol::where('codPlanF', $codPlanF)->pluck('codUsuRol')->toArray();
        $usuarios = User::all()->except($usuariosRol);
        $usuario = $usuarios->map(function($item, $key){
            $usuarioRol = UsuarioRol::where('codUsu', $key)->get();
        RegistrarActividad(UsuarioRol::TABLA,Historial::CREAR,'vió el formulario de cargar Asignacion de Rol y Cargo');
            if($usuarioRol->isNotEmpty()){
                $item->activo = true;
                return $item;
            }
            return $item;
        });

    	return view('asignacion.crear', compact(['rol', 'usuario', 'codPlanF']));
    }

    public function registrar(Request $request)
    {
    	$usuarioRol = UsuarioRol::where('codUsu', $request->usuario)->get();

    	if($usuarioRol->isEmpty()){
    	    $activo = 1;
        }else{
    	    $activo = 0;
        }

        $usuarioRol  = new UsuarioRol();
        $usuarioRol->codUsu     = $request->usuario;
        $usuarioRol->codRol     = $request->rol;
        $usuarioRol->codCarFun  = 2;
        $usuarioRol->codPlanF   = $request->codPlanF;
        $usuarioRol->horasH     = $request->horasH;
        $usuarioRol->activo     = $activo;
        $usuarioRol->sueldo     = $request->sueldo;
        $usuarioRol->save();
        RegistrarActividad(UsuarioRol::TABLA,Historial::REGISTRAR,'registró la Asignacion de Rol y Cargo '.$request->nombre);

    	return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success','Usuario asignado registrado');
    }

    public function editar($id)
    {
        $cargo = Cargofuncional::Activo()->pluck('nombre','codCarFun');
        $rol = rol::pluck('nombre','codRol');
        $usuario = User::Activo()->pluck('nombres','codUsu');
    	$usuariorol = UsuarioRol::Existe($id)->get();
        RegistrarActividad(UsuarioRol::TABLA,Historial::EDITAR,'vió el formulario de editar la Asignacion de Rol y Cargo '.$actividad->nombre);
    	return view('asignacion.editar', compact(['usuariorol','cargo','usuario','rol']));
    }

    public function actualizar(Request $request)
    {
    	$usuarioRol = UsuarioRol::find($request->id);

        $usuarioRol->codUsu     = $request->usuario;
        $usuarioRol->codRol     = $request->rol;
        $usuarioRol->horasH     = $request->horasH;
        $usuarioRol->sueldo     = $request->sueldo;
        $usuarioRol->save();
        RegistrarActividad(UsuarioRol::TABLA,Historial::ACTUALIZAR,'actualizó la Asignacion de Rol y Cargo '.$request->nombre);

    	return redirect()->route('auditoria.mostrar', $usuarioRol->codPlanF)->with('success','Usuario asignado actualizado');
    }

    public function eliminar($id)
    {
    	UsuarioRol::Existe($id)->update(['estado' => false]);
        RegistrarActividad(UsuarioRol::TABLA,Historial::ELIMINAR,'eliminó la Asignacion de Rol y Cargo '.$archivo->nombre);
    	return redirect()->route('asignarr.listar')->with('danger','Usuario asignado eliminado');
    }
}
