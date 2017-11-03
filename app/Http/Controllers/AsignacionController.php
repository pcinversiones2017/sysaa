<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plan\RegistroRequest;
use Illuminate\Http\Request;
use App\Models\UsuarioRol;
use App\Models\Cargofuncional;
use App\User;
use App\Models\Rol;

class AsignacionController extends Controller
{
    public function listar()
    {
    	$usuariorol = Usuariorol::all()->with(['usuario','cargofuncional','rol'])->get();
    	return view('asignacion.listar', compact('usuariorol'));
    }

    public function crear(Request $request)
    {
        $cargo = Cargofuncional::all()->pluck('nombre','codCarFun');
        $rol = rol::pluck('nombre','codRol');

        $codPlanF = $request->codPlanF;
        $usuariosRol = UsuarioRol::where('codPlanF', $codPlanF)->pluck('codUsuRol')->toArray();
        $usuario = User::all()->pluck('nombres','codUsu')->except($usuariosRol);

    	return view('asignacion.crear', compact(['cargo', 'rol', 'usuario', 'codPlanF']));
    }

    public function registrar(Request $request)
    {
    	UsuarioRol::create([
    	    'codUsu'    => $request->usuario,
            'codRol'    => $request->rol,
            'codCarFun' => $request->cargo,
            'codPlanF'  => $request->codPlanF,
            'horasH'    => $request->horasH,
            'sueldo'    => $request->sueldo,
        ]);
    	return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success','Usuario asignado registrado');
    }

    public function editar($id)
    {
        $cargo = Cargofuncional::Activo()->pluck('nombre','codCarFun');
        $rol = rol::pluck('nombre','codRol');
        $usuario = User::Activo()->pluck('nombres','codUsu');
    	$usuariorol = UsuarioRol::Existe($id)->get();
    	return view('asignacion.editar', compact(['usuariorol','cargo','usuario','rol']));
    }

    public function actualizar(Request $request)
    {
    	$usuarioRol = UsuarioRol::find($request->id);

        $usuarioRol->codUsu     = $request->usuario;
        $usuarioRol->codRol     = $request->rol;
        $usuarioRol->codCarFun  = $request->cargo;
        $usuarioRol->horasH     = $request->horasH;
        $usuarioRol->sueldo     = $request->sueldo;
        $usuarioRol->save();

    	return redirect()->route('auditoria.mostrar', $usuarioRol->codPlanF)->with('success','Usuario asignado actualizado');
    }

    public function eliminar($id)
    {
    	UsuarioRol::Existe($id)->update(['estado' => false]);
    	return redirect()->route('asignarr.listar')->with('danger','Usuario asignado eliminado');
    }
}
