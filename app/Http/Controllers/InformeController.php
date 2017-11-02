<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Procedimiento;

class InformeController extends Controller
{
    public function listar($id)
    {
    	$informe = Informe::Existe($id)->with('procedimiento')->get();
    	return view('informe.listar', compact('informe'));
    }

    public function crear($id)
    {
    	$id = $id;
    	return view('informe.crear', compact('id'));
    }

    public function registrar(Request $request)
    {

    	$id = Informe::create(['informe' => $request->informe, 'elaborado' => date("Y-m-d"), 'codProc' => $request->codProc]);
    	return redirect('informe/informe/'.$request->codProc)->with('success','Informe registrado');
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
    	Informe::Existe($request->id)->update(['codUsu' => $request->usuario, 'codRol' => $request->rol, 'codCarFun' => $request->cargo]);
    	return redirect()->route('informe.listar')->with('success','Informe actualizado');	
    }

    public function eliminar($id)
    {
    	Informe::Existe($id)->update(['estado' => false]);
    	return redirect()->route('informe.listar')->with('danger','Informe eliminado');
    }
}
