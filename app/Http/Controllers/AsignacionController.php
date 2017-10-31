<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plan\RegistroRequest;
use Illuminate\Http\Request;
use App\Models\Usuariorol;
use App\Models\Cargofuncional;
use App\User;
use App\Models\Rol;

class AsignacionController extends Controller
{
    public function listar()
    {
    	$usuariorol = Usuariorol::Activo()->with(['usuario','cargofuncional','rol'])->get();
    	return view('asignacion.listar', compact('usuariorol'));
    }

    public function crear(Request $request)
    {
        $cargo = Cargofuncional::Activo()->pluck('nombre','codCarFun');
        $rol = rol::pluck('nombre','codRol');
        $usuario = User::Activo()->pluck('nombres','codUsu');
        $codPlanF = $request->codPlanF;
    	return view('asignacion.crear', compact(['cargo', 'rol', 'usuario', 'codPlanF']));
    }

    public function registrar(Request $request)
    {
    	Usuariorol::create(['codUsu' => $request->usuario, 'codRol' => $request->rol, 'codCarFun' => $request->cargo, 'codPlanF' => $request->codPlanF]);
    	return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success','Usuario asignado registrado');
    }

    public function editar($id)
    {
        $cargo = Cargofuncional::Activo()->pluck('nombre','codCarFun');
        $rol = rol::pluck('nombre','codRol');
        $usuario = User::Activo()->pluck('nombres','codUsu');
    	$usuariorol = Usuariorol::Existe($id)->get();
    	return view('asignacion.editar', compact(['usuariorol','cargo','usuario','rol']));
    }

    public function actualizar(Request $request)
    {
    	Usuariorol::Existe($request->id)->update(['codUsu' => $request->usuario, 'codRol' => $request->rol, 'codCarFun' => $request->cargo]);
    	return redirect()->route('asignarr.listar')->with('success','Usuario asignado actualizado');	
    }

    public function eliminar($id)
    {
    	Usuariorol::Existe($id)->update(['estado' => false]);
    	return redirect()->route('asignarr.listar')->with('danger','Usuario asignado eliminado');
    }
}
