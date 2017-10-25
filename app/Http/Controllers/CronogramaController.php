<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use App\Models\Plan;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function crear()
    {
        $etapasPlanificacion = Etapa::where('tipo','PLANIFICACIÓN');
        $planes = Plan::all();
        $crearCronograma = 'active';
        return view('cronograma.crear')
            ->with(compact('crearCronograma','planes'))
            ->with(compact('etapasPlanificacion'));
    }

    public function test(Request $request){
        return view('cronograma.editar');
    }



}
