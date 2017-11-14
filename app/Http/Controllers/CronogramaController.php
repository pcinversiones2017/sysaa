<?php

namespace App\Http\Controllers;


use App\Http\Requests\CronogramaGeneral\RegistroRequest;
use App\Models\Cronograma;
use App\Models\Etapa;
use App\Models\Auditoria;
use App\Models\FechaEtapa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;


class CronogramaController extends Controller
{
    public function crear($codPlanF)
    {
        $etapas = Etapa::all();
        $auditoria = Auditoria::find($codPlanF);
        return view('cronograma.crear', compact('etapas', 'auditoria', 'codPlanF'));

    }


    public function guardar(RegistroRequest $request)
    {

        try{
            DB::beginTransaction();

            $auditoria = Auditoria::find($request->codPlanF);
            $fechaIniPlanF = isset($request->fecha_ini[0]) ? Carbon::parse($request->fecha_ini[0])->format('Y-m-d') : null;
            $fechaFinPlanF = isset($request->fecha_fin[5]) ? Carbon::parse($request->fecha_fin[5])->format('Y-m-d') : null;
            $animate = '#cronograma';

            if(isset($fechaIniPlanF)){
                $auditoria->fechaIniPlanF = $fechaIniPlanF;
            }
            if(isset($fechaFinPlanF)){
                $auditoria->fechaFinPlanF = $fechaFinPlanF;
            }

            $auditoria->save();

            for ($i = 0 ; $i < count($request->codEtp); $i++){
                $cronograma = new Cronograma();
                $cronograma->codEtp = $request->codEtp[$i];
                $cronograma->fecha_ini = isset($request->fecha_ini[$i]) ? Carbon::parse($request->fecha_ini[$i])->format('Y-m-d') : null;
                $cronograma->fecha_fin = isset($request->fecha_fin[$i]) ? Carbon::parse($request->fecha_fin[$i])->format('Y-m-d') : null;
                $cronograma->dias_habiles = $request->dias_habiles[$i] ?? null;
                $cronograma->codPlanF = $request->codPlanF;
                $cronograma->save();
            }

            $this->saveFechaEtapa($request);

            DB::commit();
            RegistrarActividad(Cronograma::TABLA,Historial::REGISTRAR,'registró el Cronograma '. $request->nombre);
            return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success','Cronograma Creado')->with('animate', $animate);

        }catch (\Exception $e){
            DB::rollBack();

            return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('danger','Ocurrio un error');
        }

    }


    public function eliminar(Request $request){


        $auditoria = Auditoria::find($request->codPlanF);
        $auditoria->fechaIniPlanF =null;
        $auditoria->fechaFinPlanF =null;
        $auditoria->save();

        $cronogramas = Cronograma::where('codPlanF','=',$request->codPlanF)->get();

        foreach ($cronogramas as $cronograma){
            $cronograma->delete();
        }

        RegistrarActividad(Cronograma::TABLA,Historial::ELIMINAR,'eliminó el Cronograma '.$auditoria->nombre);


        return redirect()->route('cronograma.listar')->with('success','Cronograma eliminado');


    }




    public function editar(Request $request)
    {
        $codPlanF = $request->codPlanF;
        $auditorias = Auditoria::all();
        $cronograma = Cronograma::where('codPlanF', $codPlanF)->get();

        return view('cronograma.editar', compact('auditorias', 'cronograma', 'codPlanF'));
    }


    public function actualizar(Request $request)
    {

        try{
            DB::beginTransaction();

            $auditoria = Auditoria::find($request->codPlanF);
            $fechaIniPlanF = isset($request->fecha_ini[0]) ? Carbon::parse($request->fecha_ini[0])->format('Y-m-d') : null;
            $fechaFinPlanF = isset($request->fecha_fin[5]) ? Carbon::parse($request->fecha_fin[5])->format('Y-m-d') : null;

            if(isset($fechaIniPlanF)){
                $auditoria->fechaIniPlanF = $fechaIniPlanF;
            }
            if(isset($fechaFinPlanF)){
                $auditoria->fechaFinPlanF = $fechaFinPlanF;
            }
            $auditoria->save();

            Cronograma::where('codPlanF', $request->codPlanF)->delete();
            for ($i = 0 ; $i < count($request->codEtp); $i++){
                $cronograma = new Cronograma();
                $cronograma->codEtp = $request->codEtp[$i];
                $cronograma->fecha_ini = isset($request->fecha_ini[$i]) ? Carbon::parse($request->fecha_ini[$i])->format('Y-m-d') : null;
                $cronograma->fecha_fin = isset($request->fecha_fin[$i]) ? Carbon::parse($request->fecha_fin[$i])->format('Y-m-d') : null;
                $cronograma->dias_habiles = $request->dias_habiles[$i] ?? null;
                $cronograma->codPlanF = $request->codPlanF;
                $cronograma->save();
            }

            FechaEtapa::where('codPlanF', $request->codPlanF)->delete();
            $this->saveFechaEtapa($request);
            DB::commit();

        }catch (\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage());

        }

        RegistrarActividad(Cronograma::TABLA,Historial::ACTUALIZAR,'actualizó el Cronograma de la auditoria ' . $auditoria->nombrePlanF );
        return redirect()->route('auditoria.mostrar', $request->codPlanF)->with(['success' => 'Cronograma actualizado', 'animate' => '#cronograma']);

    }

    public function saveFechaEtapa($request)
    {
        $fechaIniPlanificacion = isset($request->fecha_ini[0]) ? Carbon::parse($request->fecha_ini[0])->format('Y-m-d') : null;
        $fechaFinPlanificacion = isset($request->fecha_fin[3]) ? Carbon::parse($request->fecha_fin[3])->format('Y-m-d') : null;

        $fechaIniEjecucion = isset($request->fecha_ini[4]) ? Carbon::parse($request->fecha_ini[4])->format('Y-m-d') : null;
        $fechaFinEjecucion = isset($request->fecha_fin[4]) ? Carbon::parse($request->fecha_fin[4])->format('Y-m-d') : null;

        $fechaIniInforme = isset($request->fecha_ini[5]) ? Carbon::parse($request->fecha_ini[5])->format('Y-m-d') : null;
        $fechaFinInforme = isset($request->fecha_fin[5]) ? Carbon::parse($request->fecha_fin[5])->format('Y-m-d') : null;

        $fechaEtapa = new FechaEtapa();
        $fechaEtapa->fecha_inicio = $fechaIniPlanificacion;
        $fechaEtapa->fecha_fin = $fechaFinPlanificacion;
        $fechaEtapa->codPlanF = $request->codPlanF;
        $fechaEtapa->etapa = 'PLANIFICACION';
        $fechaEtapa->save();

        $fechaEtapa = new FechaEtapa();
        $fechaEtapa->fecha_inicio = $fechaIniEjecucion;
        $fechaEtapa->fecha_fin = $fechaFinEjecucion;
        $fechaEtapa->codPlanF = $request->codPlanF;
        $fechaEtapa->etapa = 'EJECUCION';
        $fechaEtapa->save();

        $fechaEtapa = new FechaEtapa();
        $fechaEtapa->fecha_inicio = $fechaIniInforme;
        $fechaEtapa->fecha_fin = $fechaFinInforme;
        $fechaEtapa->codPlanF = $request->codPlanF;
        $fechaEtapa->etapa = 'ELABORACIÓN DEL INFORME';
        $fechaEtapa->save();
    }

}
