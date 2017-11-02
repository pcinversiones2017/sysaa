<?php

namespace App\Http\Controllers;


use App\Http\Requests\CronogramaGeneral\RegistrarRequest;
use App\Models\Cronograma;
use App\Models\Etapa;
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


        //validar que no se pongan varios cronogramas para la misma auditoria (una auditoria un cronograma)
        $auditorias = Auditoria::all();

        $cronogramas = Cronograma::all();

            if(!empty($cronogramas->codPlanf)){

                foreach ($cronogramas as $cronograma) {

                    $auditorias = Auditoria::find('codPlanf', '!=', $cronograma->codPlanf)->get();
                }
            }

        $crearCronograma = 'active';
        return view('cronograma.crear')
            ->with(compact('crearCronograma','auditorias'))
            ->with(compact('etapasPlanificacion'))
            ->with(compact('etapaseEjecucion'))
        ->with(compact('etapasReporte'));

    }


    public function guardar(RegistrarRequest $request)
    {

        $auditoria = Auditoria::find($request->codPlanf[0]);
        $auditoria->fechaIniPlanF = date('Y-m-d',strtotime($request->fechaIni[0]));
        $auditoria->fechaFinPlanF = date('Y-m-d',strtotime($request->fechaFin[4]));
        $auditoria->save();

       $i=0;
       for($i=0;$i<=1;$i++){
        $cronograma = new Cronograma();
        $cronograma->codPlanf = $request->codPlanf[0];
        $cronograma->codEtp = $request->etapa[$i];
        $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaIni[$i]));
        $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[$i]));
        $cronograma->dias_habiles = $request->dias_habiles[$i];
        $cronograma->save();
       }
       $j=2;
        for($j=2;$j<=3;$j++){
            $cronograma = new Cronograma();
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$j];
            $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaIni[2]));;
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[2]));
            $cronograma->dias_habiles = $request->dias_habiles[2];
            $cronograma->save();
        }
        $k=4;
        for($k=4;$k<=9;$k++){
            $cronograma = new Cronograma();
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$k];
            $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaIni[3]));
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[3]));
            $cronograma->dias_habiles = $request->dias_habiles[3];
            $cronograma->save();
        }
        $l=10;
        for($l=10;$l<=12;$l++){
            $cronograma = new Cronograma();
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$l];
            $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaIni[4]));
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[4]));
            $cronograma->dias_habiles = $request->dias_habiles[4];
            $cronograma->save();
        }


        return redirect()->route('cronograma.listar')->with('success','Cronograma Creado');

    }


    public function listar()
    {
        $cronogramas = Cronograma::all();
        $auditorias = Auditoria::all();
        $listarCronograma = 'active';
        return view('cronograma.listar')
            ->with(compact('auditorias', 'listarCronograma'))
        ->with(compact('cronogramas'));
    }

    public function mostrar(Request $request)
    {
        $etapasPlanificacion = Etapa::where('tipo','=','PLANIFICACIÓN')
            ->limit(2)
            ->get()->toArray();
        $etapaseEjecucion = Etapa::where('tipo','=','EJECUCIÓN')
            ->get()->toArray();
        $etapasReporte = Etapa::where('tipo','=','ELABORACIÓN DEL INFORME')
            ->get()->toArray();


        $codPlanF=$request->codPlanF;
        $cronogramas = Cronograma::where('codPlanf','=',$codPlanF)->get()->toArray();;

        foreach ($cronogramas as $cronograma){
            $fechasIni[] = $cronograma['fechaIni'];
            $fechaFin[]= $cronograma['fechaFin'];
            $dias_habiles[] = $cronograma['dias_habiles'];

        }
        $dias_total = $dias_habiles[0]+$dias_habiles[1]+ $dias_habiles[2]+ $dias_habiles[3]+ $dias_habiles[4];
        $auditoria = Auditoria::find($request->codPlanF);

        return view('cronograma.mostrar')
            ->with(compact('cronogramas'))
            ->with(compact('auditoria'))
            ->with(compact('dias_total'))
            ->with(compact('fechasIni'))
            ->with(compact('fechaFin'))
            ->with(compact('dias_habiles'))
            ->with(compact('etapasPlanificacion'))
            ->with(compact('etapaseEjecucion'))
            ->with(compact('etapasReporte'));

    }




    public function editar(Request $request)
    {
        $auditorias = Auditoria::all();
        $etapasPlanificacion = Etapa::where('tipo','=','PLANIFICACIÓN')
            ->limit(2)
            ->get()->toArray();
        $etapaseEjecucion = Etapa::where('tipo','=','EJECUCIÓN')
            ->get()->toArray();
        $etapasReporte = Etapa::where('tipo','=','ELABORACIÓN DEL INFORME')
            ->get()->toArray();


        $codPlanF=$request->codPlanF;
        $cronogramas = Cronograma::where('codPlanf','=',$codPlanF)->get()->toArray();;

        foreach ($cronogramas as $cronograma){
            $codCroGen[] = $cronograma['codCroGen'];
            $fechasIni[] = $cronograma['fechaIni'];
            $fechaFin[]= $cronograma['fechaFin'];
            $dias_habiles[] = $cronograma['dias_habiles'];

        }


        $auditoria = Auditoria::find($request->codPlanF);

        return view('cronograma.editar')
            ->with(compact('auditorias'))
            ->with(compact('cronogramas'))
            ->with(compact('auditoria'))
            ->with(compact('dias_total'))
            ->with(compact('fechasIni'))
            ->with(compact('fechaFin'))
            ->with(compact('dias_habiles'))
            ->with(compact('etapasPlanificacion'))
            ->with(compact('etapaseEjecucion'))
            ->with(compact('etapasReporte'))
         ->with(compact('codCroGen'));
    }


    public function actualizar(Request $request)
    {

        $auditoria = Auditoria::find($request->codPlanf[0]);
        $auditoria->fechaIniPlanF = date('Y-m-d',strtotime($request->fechaIni[0]));
        $auditoria->fechaFinPlanF = date('Y-m-d',strtotime($request->fechaFin[4]));
        $auditoria->save();

        $i=0;
        for($i=0;$i<=1;$i++){
            $cronograma = Cronograma::find($request->codCroGen[$i]);
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$i];
            $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaIni[$i]));
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[$i]));
            $cronograma->dias_habiles = $request->dias_habiles[$i];
            $cronograma->save();
        }
        $j=2;
        for($j=2;$j<=3;$j++){
            $cronograma = Cronograma::find($request->codCroGen[$i]);

            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$j];
            $cronograma->fechaIni =  date('Y-m-d',strtotime($request->fechaIni[2]));
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[2]));
            $cronograma->dias_habiles = $request->dias_habiles[2];
            $cronograma->save();
        }
        $k=4;
        for($k=4;$k<=9;$k++){
            $cronograma = Cronograma::find($request->codCroGen[$i]);
            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$k];
            $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaIni[3]));
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[3]));
            $cronograma->dias_habiles = $request->dias_habiles[3];
            $cronograma->save();
        }
        $l=10;
        for($l=10;$l<=12;$l++){
            $cronograma = Cronograma::find($request->codCroGen[$i]);

            $cronograma->codPlanf = $request->codPlanf[0];
            $cronograma->codEtp = $request->etapa[$l];
            $cronograma->fechaIni = date('Y-m-d',strtotime($request->fechaFin[4]));
            $cronograma->fechaFin = date('Y-m-d',strtotime($request->fechaFin[4]));
            $cronograma->dias_habiles = $request->dias_habiles[4];
            $cronograma->save();
        }



        return redirect()->route('cronograma.listar')->with('success','Cronograma actualizado');

    }

}
