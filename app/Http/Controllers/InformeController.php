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
    	return view('informe.listar', compact(['informes', 'auditorias']));
    }

    public function crear()
    {
    	return view('informe.crear');
    }

    public function registrar(Request $request)
    {
    	$informe = new Informe();
    	$informe->informe = $request->informe;
    	$informe->codPlanF = $request->codPlanF;
    	$informe->save();
    }
}
