<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditoria;
use App\Models\Informe;

class InformeController extends Controller
{
    public function listar()
    {
    	$informes = Informe::all();
    	$auditorias = Auditoria::where('codEstAud', 3)->get();
    	$listarInforme = 'active';
    	return view('informe.listar', compact(['informes', 'auditorias', 'listarInforme']));
    }

    public function crear($codPlanF)
    {
    	$informe = Informe::find($codPlanF);
    	$listarInforme = 'active';
    	return view('informe.crear', compact(['informe', 'listarInforme', 'codPlanF']));
    }

    public function registrar(Request $request)
    {
    	$informe = new Informe();
    	$informe->informe = $request->informe;
    	$informe->codPlanF = $request->codPlanF;
        $informe->elaborado = date("Y-m-d H:i:s");
    	$informe->save();
        return redirect()->route('informe.listar')->with('success', 'Se registro informe');
    }

    public function editar($codPlanF)
    {
    	$informe = Informe::where('codPlanF', $codPlanF)->get();
    	$listarInforme = 'active';
    	return view('informe.editar', compact(['informe', 'listarInforme']));
    }

    public function actualizar(Request $request)
    {
        $data = Informe::find($request->codInf);
        $data->informe = $request->informe;
        $data->save();
        return redirect()->route('informe.listar')->with('success', 'Se actualizo el informe');
    }
}
