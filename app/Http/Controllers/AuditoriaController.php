<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auditoria\ActualizarRequest;
use App\Http\Requests\Auditoria\RegistroRequest;
use App\Models\Auditoria;

use App\Models\EstadoAuditoria;
use App\Models\FechaEtapa;
use App\Models\Macroproceso;
use App\Models\Normativa;
use App\Models\ObjetivoGeneral;
use App\Models\Plan;
use App\Models\TipoNormativa;
use App\Models\Usuariorol;
use Illuminate\Http\Request;
use App\Models\Historial;
use App\Models\Procedimiento;
use Auth;
use Illuminate\Support\Facades\App;
use PhpWord;

class AuditoriaController extends Controller
{
    public function listar()
    {
        $auditorias = Auditoria::orderBy('codPlanF', 'des')->where('tipoActividad', 'PROGRAMADA')->get();
        $listarAuditoria = 'active';
        RegistrarActividad(Auditoria::TABLA,Historial::LEER,'vió el listado de Auditorias');
        return view('auditoria.listar')->with(compact(['auditorias', 'listarAuditoria']));
    }

    public function listarNoProgramadas()
    {
        $auditorias = Auditoria::orderBy('codPlanF', 'des')->where('tipoActividad', 'NO PROGRAMADA')->get();
        $listarAuditoriaNoProgramadas = 'active';
        RegistrarActividad(Auditoria::TABLA,Historial::LEER,'vió el listado de Auditorias');
        return view('auditoria.listar')->with(compact(['auditorias', 'listarAuditoriaNoProgramadas']));
    }

    public function crear()
    {
        $planes = Plan::pluck('nombrePlan', 'codPlanA');
        $codigoServicio = Auditoria::orderBy('codPlanF', 'des')->first();
        if(isset($codigoServicio)){
            $codigoServicio = str_pad($codigoServicio->codPlanF + 1, 3, '0', STR_PAD_LEFT) .
            '-UNH-PA-' . date('dmY');
        }else{
            $codigoServicio = str_pad(1, 3, '0', STR_PAD_LEFT) . '-UNH-PA-' . date('dmY');
        }
        $peridoIni = date('d-m-Y');
        $peridoFin = date('d-m-Y', strtotime('+14 day', strtotime($peridoIni)));
        $periodo = $peridoIni . ' hasta ' . $peridoFin;
        $crearAuditoria = 'active';
        RegistrarActividad(Auditoria::TABLA,Historial::CREAR,'vió el formulario de crear Auditoria');
        return view('auditoria.crear')->with(compact('planes', 'crearAuditoria', 'periodo', 'codigoServicio'));
    }

    public function crearAuditoriaPlanAnual(Request $request)
    {
        $plan = Plan::find($request->codPlanA);
        return view('auditoria.crear-auditoria-plan-anual', compact('plan'));
    }

    public function actualizarAuditoriaPlanAnual(Request $request)
    {
        $plan = Plan::find($request->codPlanA);
        $plan->tipoActividad = $request->tipoActividad;
        $plan->save();

        return redirect()->route('plan.listar')->with('success', 'Se actualizo la auditoria');
    }

    public function guardar(RegistroRequest $request)
    {


        $auditoria = new Auditoria();
        $auditoria->nombrePlanF = $request->nombrePlanF;
        $auditoria->tipoActividad = $request->tipoActividad;

        $codigoServicio = Auditoria::orderBy('codPlanF', 'des')->first();
        if(isset($codigoServicio)){
            $codigoServicio = str_pad($codigoServicio->codPlanF + 1, 3, '0', STR_PAD_LEFT) .
                '-UNH-PA-' . date('dmY');
        }else{
            $codigoServicio = str_pad(1, 3, '0', STR_PAD_LEFT) . '-UNH-PA-' . date('dmY');
        }

        $auditoria->codigoServicioCP = $codigoServicio;

        $auditoria->codPlanA = $request->codPlanA;
        $auditoria->codEstAud = EstadoAuditoria::PENDIENTE;

        RegistrarActividad(Auditoria::TABLA,Historial::REGISTRAR,'registró la Auditoria '.$request->nombrePlanF);

        $auditoria->save();

        if(!empty($request->nombreObjetivoGeneral)){
            $objetivoGeneral = new ObjetivoGeneral();
            $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
            $objetivoGeneral->codPlanF = $auditoria->codPlanF;
            $objetivoGeneral->save();
        }

        return redirect()->route('auditoria.crear-auditoria-plan-anual', $request->codPlanA)->with('success', 'Auditoria registrada correctamente');
    }

    public function mostrar(Request $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $macroprocesos = Macroproceso::all();
        $usuariorol = UsuarioRol::where('codPlanF', $request->codPlanF)->get();

        $codPlanF  = $request->codPlanF;

        $objetivoGeneral = Procedimiento::where('codObjGen',$request->codPlanF)->get();
        $normativas = Normativa::where('codTipNorm', TipoNormativa::REGULA)->get();

        return view('auditoria.mostrar')->with(compact('auditoria', 'macroprocesos', 'usuariorol',
            'codPlanF', 'objetivoGeneral', 'normativas'));
    }


    public function editar(Request $request)
    {
        $planes = Plan::pluck('nombrePlan', 'codPlanA');
        $auditoria = Auditoria::find($request->codPlanF);
        RegistrarActividad(Auditoria::TABLA,Historial::EDITAR,'vió el formulario de editar la Auditoria ' . $auditoria->nombrePlanF);
        return view('auditoria.editar')->with(compact('planes', 'auditoria', 'periodo'));
    }

    public function actualizar(ActualizarRequest $request)
    {

        $auditoria = Auditoria::find($request->codPlanF);
        $auditoria->nombrePlanF = $request->nombrePlanF;

        $auditoria->tipoServicioCP = $request->tipoServicioCP;
        $auditoria->organoCI = $request->organoCI;
        $auditoria->origen = $request->origen;
        $auditoria->entidadAuditada = $request->entidadAuditada;
        $auditoria->entidadAuditora = $request->entidadAuditora;
        $auditoria->tipoDemanda = $request->tipoDemanda;
        $auditoria->fechaIniPlanF = $request->fechaIniPlanF;
        $auditoria->fechaFinPlanF = $request->fechaFinPlanF;

        if(!empty($request->periodoIniPlanF)){
            $auditoria->periodoIniPlanF = date('Y-m-d', strtotime($request->periodoIniPlanF));
        }
        if(!empty($request->periodoFinPlanF)){
            $auditoria->periodoFinPlanF = date('Y-m-d', strtotime($request->periodoFinPlanF));
        }

        $auditoria->save();

        RegistrarActividad(Auditoria::TABLA,Historial::ACTUALIZAR,'actualizó la Auditoria '.$request->nombrePlanF);

        if(!empty($request->nombreObjetivoGeneral)){
            if(isset($auditoria->objetivoGeneral->codObjGen)){
                $objetivoGeneral = ObjetivoGeneral::find($auditoria->objetivoGeneral->codObjGen);
                $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
                $objetivoGeneral->save();
            } else {
                $objetivoGeneral = new ObjetivoGeneral();
                $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
                $objetivoGeneral->codPlanF = $auditoria->codPlanF;
                $objetivoGeneral->save();
            }

        }


        if($auditoria->tipoActividad ==  'PROGRAMADA'){
            return redirect('auditoria/listar')->with('success', 'Auditoria actualizada correctamente');
        }else{
            return redirect('auditoria/listar-no-programadas')->with('success', 'Auditoria actualizada correctamente');
        }


    }

    public function eliminar(Request $request)
    {
        try{
            $auditoria = Auditoria::find($request->codPlanF);
            $auditoria->delete();
            RegistrarActividad(Auditoria::TABLA,Historial::ELIMINAR,'eliminó la Auditoria '.$auditoria->nombrePlanF);

            return redirect()->route('auditoria.listar')->with('success', 'Auditoria eliminada correctamente');
        }catch (\Exception $e){
            echo  $e->getMessage();
        }
    }


    public function culminarAuditoria(Request $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $auditoria->codEstAud = EstadoAuditoria::PENDIENTE_APROBACION;
        $auditoria->save();
        return redirect()->route('auditoria.mostrar', $request->codPlanF)
            ->with('Se Culminó la planificación, queda pendiente la aprobacion por parte del Jefe de comisión');
    }

    public function finalizarAuditoria(Request $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $auditoria->codEstAud = EstadoAuditoria::FINALIZADO;
        $auditoria->save();
        return redirect()->route('auditoria.mostrar', $request->codPlanF)
            ->with('Se Finalizó la planificación, queda pendiente la aprobacion por parte del Jefe de comisión');
    }

    public function gantt()
    {
        $auditorias = Auditoria::all();
        $gantt = 'active';
        return view('auditoria.gantt', compact('auditorias', 'gantt'));
    }

    public function diagramaGantt(Request $request)
    {
        $codPlanF = $request->codPlanF;
        $auditoria = Auditoria::find($codPlanF);
        $fecha_etapa = FechaEtapa::where('codPlanF', $codPlanF)->where('etapa', 'EJECUCION')->first();
        if(!isset($fecha_etapa)){
            return response()->json(['data' => [], 'message' =>'No se le ha creado un cronograma para esta auditoria', 'success' => false]);
        }
        if(!isset($auditoria->objetivoGeneral)){
            return response()->json(['data' => [], 'message' => 'No se ha creado un objetivo general para esta auditoria', 'success' => false]);
        }

        if(isset($auditoria->objetivoGeneral) && $auditoria->objetivoGeneral->procedimientos->isEmpty()){
            return response()->json(['data' => [], 'message' => 'No tiene procedimientos creados', 'success' => false]);
        }

        $procedimientos = $auditoria->objetivoGeneral->procedimientos;

        $data = [];
        $i = 1;
        $colors = ['Orange', 'Blue', 'Green', 'Red'];

        foreach ($procedimientos as $procedmiento){
            $row['name'] = 'Procedimiento ' . $i;
            $row['desc'] = $procedmiento->detalle;
            $from = strtotime(date('Y-m-d')) . '000';
            $to = strtotime($procedmiento->fecha_fin) . '000';
            $row['values'] = [
                [
                    'from' => "/Date($from)/",
                    'to' => "/Date($to)/",
                    'label' => "Procedimiento $i",
                    'customClass' => 'gantt' . $colors[array_rand($colors)],
                    'dataObj' => $procedmiento->detalle
                ]
            ];

            $data[] = $row;
            $i++;
        }

        $objetivosEspecificos = $auditoria->objetivoGeneral->objetivosEspecificos;
        if($objetivosEspecificos->isNotEmpty()){
            foreach ($objetivosEspecificos as $objetivoEspecifico){
                foreach ($objetivoEspecifico->procedimientos as $procedmiento){
                    $row['name'] = 'Procedimiento ' . $i;
                    $row['desc'] = $procedmiento->detalle;
                    $from = strtotime(date('Y-m-d')) . '000';
                    $to = strtotime($procedmiento->fecha_fin) . '000';
                    $row['values'] = [
                        [
                            'from' => "/Date($from)/",
                            'to' => "/Date($to)/",
                            'label' => "Procedimiento $i",
                            'customClass' => 'gantt' . $colors[array_rand($colors)],
                            'dataObj' => $procedmiento->detalle
                        ]
                    ];

                    $data[] = $row;
                    $i++;
                }
            }
        }



        return response()->json(['data' => $data, 'message' => '', 'success' => true]);

//        name: "Sprint 0",
//        desc: "Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.",
//        values: [{
//        from: "/Date(1320192000000)/",
//            to: "/Date(1322401600000)/",
//            label: "Requirement Gathering",
//            customClass: "ganttRed",
//            dataObj: 'auris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulv'
//        }]
    }
}
