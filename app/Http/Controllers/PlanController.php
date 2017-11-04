<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Plan\ActualizarRequest;
use App\Http\Requests\Plan\RegistroRequest;
use App\Models\Plan;
use App\Models\Historial;
use Auth;

class PlanController extends Controller
{
    public function listar()
    {
        $planes = Plan::all();
        $listarPlan = 'active';
        RegistrarActividad(Plan::TABLA,Historial::LEER,'vió el listado de Planes');
        return view('plan.listar')->with(compact('planes', 'listarPlan'));
    }

    public function crear()
    {
        $crearPlan = 'active';
        RegistrarActividad(Plan::TABLA,Historial::CREAR,'vió el formulario de crear Plan');
        return view('plan.crear')->with(compact('crearPlan'));
    }

    public function guardar(RegistroRequest $request)
    {
        $planAnual = new Plan();
        $planAnual->nombrePlan = $request->nombrePlan;
        $planAnual->save();
        RegistrarActividad(Plan::TABLA,Historial::REGISTRAR,'registró el plan '.$request->nombrePlan);
        return redirect()->route('plan.listar')->with('success', 'Plan registrado');
    }

    public function editar(Request $request)
    {
        $plan = Plan::find($request->codPlanA);
        RegistrarActividad(Plan::TABLA,Historial::EDITAR,'vió el formulario de editar el plan '.$plan->nombrePlan);
        return view('plan.editar')->with(compact('plan'));
    }

    public function actualizar(ActualizarRequest $request)
    {
        $plan = Plan::find($request->codPlanA);
        $plan->nombrePlan = $request->nombrePlan;
        $plan->save();
        RegistrarActividad(Plan::TABLA,Historial::ACTUALIZAR,'actualizó el plan '.$plan->nombrePlan);
        return redirect()->route('plan.listar')->with('success', 'Plan actualizado');
    }

    public function eliminar(Request $request)
    {
        $plan = Plan::find($request->codPlanA);
        $plan->delete();
        RegistrarActividad(Plan::TABLA,Historial::ELIMINAR,'eliminó el plan '.$plan->nombrePlan);
        return back()->with('success', 'Plan Eliminado');
    }
}
