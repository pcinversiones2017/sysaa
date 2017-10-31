<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Procedimiento\ValidarRequest;
use App\Models\Procedimiento;

class ProcedimientoController extends Controller
{
    public function listar()
    {
    	$procedimiento = Procedimiento::Activo()->get();
    	return view('procedimiento.listar', compact('procedimiento'));
    }

    public function crear($id)
    {
    	$id = $id;
    	return view('procedimiento.crear', compact('id'));
    }

    public function registrar(ValidarRequest $request)
    {
    	Procedimiento::create([	
    					'justificacion' => $request->justificacion, 
    					'detalle' 		=> $request->detalle, 
    					'fechafin' 		=> $request->fechafin,
    					'codObjEsp' 	=> $request->id
    				]);
    	return redirect('objetivo-especifico/mostrar/'.$request->id)->with('success','Se agrego Procedimiento');
    }

    public function editar($id, $oe)
    {
    	$procedimiento = Procedimiento::Existe($id)->get();
    	$oe = $oe;
    	return view('procedimiento.editar', compact('procedimiento','oe'));
    }

    public function actualizar(ValidarRequest $request)
    {
    	Procedimiento::Existe($request->id)->update(['justificacion' => $request->justificacion,'detalle' => $request->detalle, 'fechafin'=> $request->fechafin,]);
    	return redirect('objetivo-especifico/mostrar/'.$request->oe)->with('success','Procedimiento actualizado');	
    }

    public function eliminar($id)
    {
    	Procedimiento::Existe($id)->update(['estado' => false]);
    	return back()->with('danger','Procedimiento eliminado');
    }
}
