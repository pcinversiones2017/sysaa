<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plan\ActualizarRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\Plan\RegistroRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $planes = Plan::all();
        $listarPlan = 'active';
        return view('plan.listar')->with(compact('planes', 'listarPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $crearPlan = 'active';
        return view('plan.crear')->with(compact('crearPlan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(RegistroRequest $request)
    {
        $planAnual = new Plan();
        $planAnual->nombrePlan = $request->nombrePlan;
        $planAnual->save();
        return redirect()->route('plan.listar')->with('success', 'Plan registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $plan = Plan::find($request->codPlanA);
        return view('plan.editar')->with(compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ActualizarRequest $request)
    {
        $plan = Plan::find($request->codPlanA);
        $plan->nombrePlan = $request->nombrePlan;
        $plan->save();

        return redirect()->route('plan.listar')->with('success', 'Plan actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        try{
            $plan = Plan::find($request->codPlanA);
            $plan->delete();
            return redirect()->route('plan.listar')->with('success', 'Plan Eliminado');
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
}
