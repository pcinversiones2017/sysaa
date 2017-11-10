<?php

namespace App\Http\Controllers;

use App\Http\Requests\Normativa\RegistrarRequest;
use App\Models\Macroproceso;
use App\Models\Normativa;
use App\Models\NormativaMacroProceso;
use App\Models\NormativaMarcoProceso;
use App\Models\TipoNormativa;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;


class NormaAuditoriaController extends Controller
{
    public function listar()
    {
       $normasCAuditoria = Normativa::where('codTipNorm','=','2')->get();
        RegistrarActividad(Normativa::TABLA,Historial::LEER,'vió el listado de Normas');
        return view('norma_auditoria.listar')->with(compact('normasCAuditoria'));
    }
    public function listarAplica()
    {
        $normativas = Normativa::all();

        return view('norma_auditoria.listar-aplica')->with(compact('normativas'));
    }

    public function crear($codPlanF){

        $macroProcesos = Macroproceso::pluck('nombre', 'codMacroP');

        RegistrarActividad(Normativa::TABLA,Historial::CREAR,'vió el formulario de crear Norma');
        return view('norma_auditoria.crear')->with(compact('macroProcesos'));
    }

    public function  guardar(RegistrarRequest $request){

        $normativa = new Normativa();
        $normativa->tipoNormativa = $request->tipoNormativa;
        $normativa->fecha  = $request->fecha;
        $normativa->nombre = $request->nombre;
        $normativa->numero = $request->numero;
        $normativa->codTipNorm = TipoNormativa::APLICABLE;
        $normativa->codMacroP  = $request->codMacroP;
        $normativa->save();
        
        RegistrarActividad(Normativa::TABLA,Historial::REGISTRAR,'registró la Norma ' . $request->nombre);
        return redirect()->route('norma-auditoria.listar-aplica')->with('success','Normativa Creada');
    }

    public function editar(Request $request){
        $macroProcesos = Macroproceso::pluck('nombre', 'codMacroP');
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        RegistrarActividad(Normativa::TABLA,Historial::EDITAR,'vió el formulario de editar la Actividad '.$normativaMacroproceso->nombre);

        return view('norma_auditoria.editar')->with(compact('normativaMacroproceso'))
            ->with(compact('macroProcesos'));
    }

    public function eliminar(Request $request){
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        $normativaMacroproceso->delete();
        RegistrarActividad(Normativa::TABLA,Historial::ELIMINAR,'eliminó la Actividad '.$normativaMacroproceso->nombre);
        return redirect()->route('norma_auditoria.listarAplica')->with('success','Normativa ELIMNADA');
    }

    public function actualizar(Request $request){

        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        $normativaMacroproceso->codNorm = $request->codNorm;
        $normativaMacroproceso->codMacroP = $request->codMacroP;
        $normativaMacroproceso->save();

        $normasCAuditoria = Normativa::find($request->codNorm);
        $normasCAuditoria->tipoNormativa = $request->tipoNormativa;
        $normasCAuditoria->nombre = $request->nombre;
        $normasCAuditoria->numero = $request->numero;
        $normasCAuditoria->fecha = $request->fecha;
        $normasCAuditoria->save();

        RegistrarActividad(Normativa::TABLA,Historial::ACTUALIZAR,'actualizó la Actividad '.$request->nombre);

        return redirect()->route('norma_auditoria.listarAplica');

    }

    public function archivocrear(Request $request)
    {
        $codNormMacro=$request->codNormMacro;

        return view('norma_auditoria.archivocrear')->with(compact('codNormMacro'));
    }

    public function archivoregistrar(Request $request)
    {
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            $normativaMacroproceso->nombre_archivo = $archivo;
            $normativaMacroproceso->save();
            return redirect()->route('norma_auditoria.listarAplica')->with('success','Archivo cargado');
        }else
        {
            return redirect()->route('norma_auditoria.listarAplica')->with('danger','Debe cargar un archivo');
        }

    }

    public function archivodescargar(Request $request)
    {
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);

        $descargar  = storage_path('/app/public/'.$normativaMacroproceso->nombre_archivo);

        return response()->download($descargar);
    }

    public function archivoeliminar(Request $request)
    {
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);

        $normativaMacroproceso->nombre_archivo = null;
        $normativaMacroproceso->save();

        RegistrarActividad(Normativa::TABLA,Historial::ELIMINAR,'eliminó el archivo de la norma'.$actividad->nombre);
        return redirect()->route('norma_auditoria.listarAplica')->with('success','Archivo eliminado');
    }
}
