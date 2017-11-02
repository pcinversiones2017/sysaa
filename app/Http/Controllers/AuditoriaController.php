<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auditoria\ActualizarRequest;
use App\Http\Requests\Auditoria\RegistroRequest;
use App\Models\Auditoria;
use App\Models\Cronograma;
use App\Models\Macroproceso;
use App\Models\ObjetivoGeneral;
use App\Models\Plan;
use App\Models\Usuariorol;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $auditorias = Auditoria::all();
        return view('auditoria.listar')->with(compact('auditorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $planes = Plan::pluck('nombrePlan', 'codPlanA');
        $peridoIni = date('d-m-Y');
        $peridoFin = date('d-m-Y', strtotime('+14 day', strtotime($peridoIni)));
        $periodo = $peridoIni . ' hasta ' . $peridoFin;
        $crearAuditoria = 'active';
        return view('auditoria.crear')->with(compact('planes', 'crearAuditoria', 'periodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(RegistroRequest $request)
    {
        $auditoria = new Auditoria();
        $auditoria->nombrePlanF = $request->nombrePlanF;
        $auditoria->codigoServicioCP = $request->codigoServicioCP;
        $auditoria->tipoServicioCP = $request->tipoServicioCP;
        $auditoria->organoCI = $request->organoCI;
        $auditoria->origen = $request->origen;
        $auditoria->entidadAuditada = $request->entidadAuditada;
        $auditoria->tipoDemanda = $request->tipoDemanda;
        $auditoria->fechaIniPlanF = $request->fechaIniPlanF;
        $auditoria->fechaFinPlanF = $request->fechaFinPlanF;
        $auditoria->periodoIniPlanF = $request->periodoIniPlanF;
        $auditoria->periodoFinPlanF = $request->periodoFinPlanF;
        $auditoria->codPlanA = $request->codPlanA;
        $auditoria->estadoAuditoria = 'pendiente';

        $periodo = explode('hasta', $request->periodo);
        $auditoria->periodoIniPlanF = date('Y-m-d', strtotime($periodo[0]));
        $auditoria->periodoFinPlanF = date('Y-m-d', strtotime($periodo[1]));

        $auditoria->save();

        if(!empty($request->nombreObjetivoGeneral)){
            $objetivoGeneral = new ObjetivoGeneral();
            $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
            $objetivoGeneral->codPlanF = $auditoria->codPlanF;
            $objetivoGeneral->save();
        }

        return redirect()->route('auditoria.listar')->with('success', 'Auditoria registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $macroprocesos = Macroproceso::all();
        $usuariorol = Usuariorol::Activo()->with(['usuario','cargofuncional','rol'])->get();

        return view('auditoria.mostrar')->with(compact('auditoria', 'macroprocesos', 'usuariorol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $planes = Plan::pluck('nombrePlan', 'codPlanA');
        $auditoria = Auditoria::find($request->codPlanF);
        $periodoIni = date('d-m-Y', strtotime($auditoria->periodoIniPlanF));
        $periodoFin = date('d-m-Y', strtotime($auditoria->periodoFinPlanF));
        $periodo = $periodoIni . ' hasta ' . $periodoFin;
        return view('auditoria.editar')->with(compact('planes', 'auditoria', 'periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ActualizarRequest $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $auditoria->nombrePlanF = $request->nombrePlanF;
        $auditoria->codigoServicioCP = $request->codigoServicioCP;
        $auditoria->tipoServicioCP = $request->tipoServicioCP;
        $auditoria->organoCI = $request->organoCI;
        $auditoria->origen = $request->origen;
        $auditoria->entidadAuditada = $request->entidadAuditada;
        $auditoria->tipoDemanda = $request->tipoDemanda;
        $auditoria->fechaIniPlanF = $request->fechaIniPlanF;
        $auditoria->fechaFinPlanF = $request->fechaFinPlanF;
        $auditoria->periodoIniPlanF = $request->periodoIniPlanF;
        $auditoria->periodoFinPlanF = $request->periodoFinPlanF;
        $auditoria->codPlanA = $request->codPlanA;
        $auditoria->estadoAuditoria = 'pendiente';

        $periodo = explode('hasta', $request->periodo);
        $auditoria->periodoIniPlanF = date('Y-m-d', strtotime($periodo[0]));
        $auditoria->periodoFinPlanF = date('Y-m-d', strtotime($periodo[1]));

        $auditoria->save();

        if(!empty($request->nombreObjetivoGeneral)){
            $objetivoGeneral = ObjetivoGeneral::find($auditoria->objetivoGeneral->codObjGen);
            $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
            $objetivoGeneral->save();
        }

        return redirect()->route('auditoria.listar')->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditoria $auditoria)
    {
        //
    }
}
