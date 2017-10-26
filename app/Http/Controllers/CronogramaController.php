<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
use App\Models\Etapa;
use App\Models\Plan;
use App\Models\Auditoria;
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
        // $planes = Plan::all();
        $auditorias = Auditoria::all();
        $crearCronograma = 'active';
        return view('cronograma.crear')
            ->with(compact('crearCronograma','auditorias'))
            ->with(compact('etapasPlanificacion'))
            ->with(compact('etapaseEjecucion'))
        ->with(compact('etapasReporte'));

    }

    public function guardar(Request $request)
    {
       $i=0;
       for($i=0;$i<=1;$i++){
        $cronograma = new Cronograma();
        $cronograma->codPlanf = $request->codPlanf[0];
        $cronograma->codEtp = $request->etapa[$i];
        $cronograma->fechaIni = $request->fechaIni[$i];
        $cronograma->fechaFin = $request->fechaFin[$i];
        $cronograma->dias_habiles = $request->dias_habiles[$i];
        $cronograma->save();
       }
       $j=2;
        for($j=2;$j<=3;$j++){
            $cronograma = new Cronograma();
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$j];
            $cronograma->fechaIni = $request->fechaIni[2];
            $cronograma->fechaFin = $request->fechaFin[2];
            $cronograma->dias_habiles = $request->dias_habiles[2];
            $cronograma->save();
        }
        $k=4;
        for($k=4;$k<=9;$k++){
            $cronograma = new Cronograma();
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$k];
            $cronograma->fechaIni = $request->fechaIni[3];
            $cronograma->fechaFin = $request->fechaFin[3];
            $cronograma->dias_habiles = $request->dias_habiles[3];
            $cronograma->save();
        }
        $l=10;
        for($l=10;$l<=12;$l++){
            $cronograma = new Cronograma();
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$l];
            $cronograma->fechaIni = $request->fechaIni[4];
            $cronograma->fechaFin = $request->fechaFin[4];
            $cronograma->dias_habiles = $request->dias_habiles[4];
            $cronograma->save();
        }




        return redirect('cronograma/crear');
    }


    public function listar()
    {
        $auditorias = Auditoria::all();
        $listarCronograma = 'active';
        return view('cronograma.listar')->with(compact('auditorias', 'listarCronograma'));
    }





    public function test(Request $request){
        return view('cronograma.editar');
    }



}
