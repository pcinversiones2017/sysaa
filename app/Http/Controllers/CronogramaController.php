<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
use App\Models\Etapa;
use App\Models\Plan;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function crear()
    {
        $etapasPlanificacion = Etapa::where('tipo','=','PLANIFICACIÓN')
            ->limit(2)
            ->get()->toArray();
        $etapaseEjecucion = Etapa::where('tipo','=','EJECUCIÓN')
            ->get()->toArray();
        $etapasReporte = Etapa::where('tipo','=','ELABORACIÓN DEL INFORME')
            ->get()->toArray();
        $planes = Plan::all();
        $crearCronograma = 'active';
        return view('cronograma.crear')
            ->with(compact('crearCronograma','planes'))
            ->with(compact('etapasPlanificacion'))
            ->with(compact('etapaseEjecucion'))
        ->with(compact('etapasReporte'));

    }




    public function test(Request $request){
        return view('cronograma.editar');
    }



}
