<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;
use App\Models\Auditoria;
use App\Models\Informe;
use Jenssegers\Date\Date;

class InformeController extends Controller
{
    public function listar()
    {

    	$auditorias = Auditoria::where('codEstAud', 4)->whereNull('entidadAuditora')->get();
    	$listarInforme = 'active';
    	return view('informe.listar', compact('auditorias', 'listarInforme'));
    }

    public function corto()
    {
        $terceros = 'DE TERCEROS';
        $auditorias = Auditoria::where('codEstAud', 4)->whereNotNull('entidadAuditora')->get();
        $listarInformeCorto = 'active';
        return view('informe.listar', compact( 'auditorias', 'listarInformeCorto', 'terceros'));
    }

    public function crear($codPlanF)
    {
    	$informe = Informe::find($codPlanF);
    	$auditoria = Auditoria::find($codPlanF);
        $institucion = Institucion::find(1);
        Date::setLocale('es');
        $periodo = Date::parse($auditoria->periodoIniPlanF)->format('d \d\e F \d\e\l Y') . ' AL '
            . Date::parse($auditoria->periodoFinPlanF)->format('d \d\e F \d\e\l Y') ;

    	$view = view('reportes.auditoria.informe-final', compact('auditoria', 'institucion', 'periodo'));
    	$listarInforme = 'active';
    	return view('informe.crear', compact(['informe', 'listarInforme', 'codPlanF', 'view']));
    }

    public function registrar(Request $request)
    {
        $informe = new Informe();
    	$informe->informe = $request->informe;
    	$informe->codPlanF = $request->codPlanF;
        $informe->elaborado = date("Y-m-d H:i:s");
    	$informe->save();
    	if(!empty($informe->auditoria->entidadAuditada)){
    	    $route = 'informe.corto';
        }else{
    	    $route = 'informe.listar';
        }

        return redirect()->route($route)->with('success', 'Se registro informe');
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

    public function mostrar($codInf)
    {
        $informe = Informe::find($codInf);
        $listarInforme = 'active';        
        return view('informe.mostrar', compact(['informe', 'listarInforme']));
    }
}
