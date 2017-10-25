<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Plan;
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
        $planes = Plan::all();
        return view('auditoria.crear')->with(compact('planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
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

        $auditoria->save();

        return redirect('auditoria/listar');
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
        return view('auditoria.mostrar')->with(compact('auditoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function editar(Auditoria $auditoria)
    {
        $planes = Plan::all();
        return view('auditoria.editar')->with(compact('planes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auditoria  $auditoria
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Auditoria $auditoria)
    {
        //
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
