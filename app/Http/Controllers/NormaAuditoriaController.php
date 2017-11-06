<?php

namespace App\Http\Controllers;

use App\Http\Requests\Normativa\RegistrarRequest;
use App\Models\Macroproceso;
use App\Models\Normativac;
use App\Models\normativaMarcoproceso;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;


class NormaAuditoriaController extends Controller
{
    public function listar()
    {
       $normasCAuditoria = Normativac::where('codTipNorm','=','2')->get();
        RegistrarActividad(Normativac::TABLA,Historial::LEER,'vió el listado de Normas');
        return view('normaAuditoria.listar')->with(compact('normasCAuditoria'));
    }
    public function listarAplica()
    {
        $normativaMacroproceso = NormativaMarcoproceso::all();

        return view('normaAuditoria.listarAplica')->with(compact('normativaMacroproceso'));
    }

    public function crear(){

        $macroProcesos = Macroproceso::pluck('nombre', 'codMacroP');

        RegistrarActividad(Normativac::TABLA,Historial::CREAR,'vió el formulario de crear Norma');
        return view('normaAuditoria.crear')->with(compact('macroProcesos'));
    }

    public function  guardar(RegistrarRequest $request){

        $normaCAuditoria = new Normativac();
        $normaCAuditoria->tipoNormativa = $request->tipoNormativa;
        $normaCAuditoria->fecha =$request->fecha;
        $normaCAuditoria->nombre = $request->nombre;
        $normaCAuditoria->numero= $request->numero;
        $normaCAuditoria->codTipNorm = '1';
        $normaCAuditoria->save();

        $normativaMacroproceso = new NormativaMarcoproceso();
        $normativaMacroproceso->codNorm = $normaCAuditoria->codNorm;
        $normativaMacroproceso->codMacroP = $request->codMacroP;
        $normativaMacroproceso->save();

        RegistrarActividad(Normativac::TABLA,Historial::REGISTRAR,'registró la Norma '.$request->nombre);
        return redirect()->route('normaAuditoria.listarAplica')->with('success','Normativa Creada');
    }

    public function editar(Request $request){
        $macroProcesos = Macroproceso::pluck('nombre', 'codMacroP');
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        RegistrarActividad(Normativac::TABLA,Historial::EDITAR,'vió el formulario de editar la Actividad '.$normativaMacroproceso->nombre);

        return view('normaAuditoria.editar')->with(compact('normativaMacroproceso'))
            ->with(compact('macroProcesos'));
    }

    public function eliminar(Request $request){
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        $normativaMacroproceso->delete();
        RegistrarActividad(Normativac::TABLA,Historial::ELIMINAR,'eliminó la Actividad '.$normativaMacroproceso->nombre);
        return redirect()->route('normaAuditoria.listarAplica')->with('success','Normativa ELIMNADA');
    }

    public function actualizar(Request $request){

        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        $normativaMacroproceso->codNorm = $request->codNorm;
        $normativaMacroproceso->codMacroP = $request->codMacroP;
        $normativaMacroproceso->save();

        $normasCAuditoria = Normativac::find($request->codNorm);
        $normasCAuditoria->tipoNormativa = $request->tipoNormativa;
        $normasCAuditoria->nombre = $request->nombre;
        $normasCAuditoria->numero = $request->numero;
        $normasCAuditoria->fecha = $request->fecha;
        $normasCAuditoria->save();

        RegistrarActividad(Normativac::TABLA,Historial::ACTUALIZAR,'actualizó la Actividad '.$request->nombre);

        return redirect()->route('normaAuditoria.listarAplica');

    }

    public function archivocrear(Request $request)
    {
        $codNormMacro=$request->codNormMacro;

        return view('normaAuditoria.archivocrear')->with(compact('codNormMacro'));
    }

    public function archivoregistrar(Request $request)
    {
        $normativaMacroproceso = NormativaMarcoproceso::find($request->codNormMacro);
        if($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo')->store('archivo','public');
            $normativaMacroproceso->nombre_archivo = $archivo;
            $normativaMacroproceso->save();
            return redirect()->route('normaAuditoria.listarAplica')->with('success','Archivo cargado');
        }else
        {
            return redirect()->route('normaAuditoria.listarAplica')->with('danger','Debe cargar un archivo');
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

        RegistrarActividad(Normativac::TABLA,Historial::ELIMINAR,'eliminó el archivo de la norma'.$actividad->nombre);
        return redirect()->route('normaAuditoria.listarAplica')->with('success','Archivo eliminado');
    }
}
