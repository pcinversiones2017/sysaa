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

    /*
    public function guardar(Request $request)
    {

       foreach ($request as $req)

           $cronograma = new Cronograma();
        $cronograma->codPlanA = $req->codPlanA;
        $cronograma->codEtp = $req->etapa;
        $cronograma->fechaIni = $req->fechaIni;
        $cronograma->fechaFin = $req->fechaFin;
        $cronograma->dias_habiles = $req->dias_habiles;
        $cronograma->save();

        endforeach

        return redirect('auditoria/listar');
    }

*/

    public function test(Request $request){
        return view('cronograma.editar');
    }



}
