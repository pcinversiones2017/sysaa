<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auditoria\ActualizarRequest;
use App\Http\Requests\Auditoria\RegistroRequest;
use App\Models\Auditoria;

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

class AuditoriaController extends Controller
{
    public function listar()
    {
        $auditorias = Auditoria::orderBy('codPlanF', 'des')->get();
        $listarAuditoria = 'active';
        RegistrarActividad(Auditoria::TABLA,Historial::LEER,'vió el listado de Auditorias');
        return view('auditoria.listar')->with(compact(['auditorias', 'listarAuditoria']));
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

    public function guardar(RegistroRequest $request)
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
        $auditoria->codPlanA = $request->codPlanA;
        $auditoria->estadoAuditoria = 'pendiente';

        if(!empty($request->periodoIniPlanF)){
            $auditoria->periodoIniPlanF = date('Y-m-d', strtotime($request->periodoIniPlanF));
        }

        if(!empty($request->periodoFinPlanF)){
            $auditoria->periodoFinPlanF = date('Y-m-d', strtotime($request->periodoFinPlanF));
        }

        RegistrarActividad(Auditoria::TABLA,Historial::REGISTRAR,'registró la Auditoria '.$request->nombrePlanF);

        $auditoria->save();

        if(!empty($request->nombreObjetivoGeneral)){
            $objetivoGeneral = new ObjetivoGeneral();
            $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
            $objetivoGeneral->codPlanF = $auditoria->codPlanF;
            $objetivoGeneral->save();
        }

        return redirect()->route('auditoria.listar')->with('success', 'Auditoria registrada');
    }

    public function mostrar(Request $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $macroprocesos = Macroproceso::all();
        $usuariorol = UsuarioRol::where('codPlanF', $request->codPlanF)->with(['usuario','cargofuncional','rol'])->get();
        $codPlanF  = $request->codPlanF;

        $objetivoGeneral = Procedimiento::where('codObjGen',$request->codPlanF)->get();
        $normativas = Normativa::where('codTipNorm', TipoNormativa::REGULA)->get();

        return view('auditoria.mostrar')->with(compact('auditoria', 'macroprocesos', 'usuariorol',
            'codPlanF', 'objetivoGeneral', 'normativas'));
    }

    public function informeFinal(Request $request)
    {
        $auditoria = Auditoria::find($request->codPlanF);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

    }

    public function editar(Request $request)
    {
        $planes = Plan::pluck('nombrePlan', 'codPlanA');
        $auditoria = Auditoria::find($request->codPlanF);
        RegistrarActividad(Auditoria::TABLA,Historial::EDITAR,'vió el formulario de editar la Auditoria '.$auditoria->nombrePlanF);
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
        $auditoria->tipoDemanda = $request->tipoDemanda;
        $auditoria->fechaIniPlanF = $request->fechaIniPlanF;
        $auditoria->fechaFinPlanF = $request->fechaFinPlanF;
        $auditoria->periodoIniPlanF = $request->periodoIniPlanF;
        $auditoria->periodoFinPlanF = $request->periodoFinPlanF;
        $auditoria->codPlanA = $request->codPlanA;
        $auditoria->estadoAuditoria = 'pendiente';

        $auditoria->periodoIniPlanF = date('Y-m-d', strtotime($request->periodoIniPlanF));
        $auditoria->periodoFinPlanF = date('Y-m-d', strtotime($request->periodoFinPlanF));

        RegistrarActividad(Auditoria::TABLA,Historial::ACTUALIZAR,'actualizó la Auditoria '.$request->nombrePlanF);
        $auditoria->save();

        if(!empty($request->nombreObjetivoGeneral)){
            $objetivoGeneral = ObjetivoGeneral::find($auditoria->objetivoGeneral->codObjGen);
            $objetivoGeneral->nombre = $request->nombreObjetivoGeneral;
            $objetivoGeneral->save();
        }

        return redirect()->route('auditoria.listar')->with('success', 'Auditoria actualizada correctamente');
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
}
