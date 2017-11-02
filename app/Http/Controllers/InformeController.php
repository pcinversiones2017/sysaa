<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Procedimiento;

class InformeController extends Controller
{
    public function listar($codPlanF, $codObjEsp, $codProc)
    {
    	$informe = Informe::Existe($codProc)->with('procedimiento')->get();
        $codPlanF = $codPlanF;
        $codObjEsp = $codObjEsp;
        $codProc = $codProc;
    	return view('informe.listar', compact(['codPlanF', 'codObjEsp', 'codProc', 'informe']));
    }

    public function crear($codPlanF, $codObjEsp, $codProc)
    {
    	$codPlanF = $codPlanF;
        $codObjEsp = $codObjEsp;
        $codProc = $codProc;
    	return view('informe.crear', compact(['codPlanF', 'codObjEsp', 'codProc']));
    }

    public function registrar(Request $request)
    {
    	Informe::create(['informe' => $request->informe, 'elaborado' => date("Y-m-d"), 'codProc' => $request->codProc]);
    	return redirect('informe/informe/'.$request->codPlanF.'/'.$request->codObjEsp.'/'.$request->codProc)->with('success','Informe registrado');
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
