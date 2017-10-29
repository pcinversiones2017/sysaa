<?php

namespace App\Http\Controllers;

use App\Models\Macroproceso;
use App\Models\Normativac;
use App\Models\normativaMarcoproceso;
use Illuminate\Http\Request;


class NormaAuditoriaController extends Controller
{
    public function listar()
    {
       $normasCAuditoria = Normativac::where('codTipNorm','=','2')->get();
        return view('normaAuditoria.listar')->with(compact('normasCAuditoria'));
    }
    public function listarAplica()
    {
        $normasCAuditoria = Normativac::where('codTipNorm','=','1')
           ->get();
        return view('normaAuditoria.listarAplica')->with(compact('normasCAuditoria'));
    }

    public function crear(){

        $macroProcesos = Macroproceso::pluck('nombre', 'codMacroP');
        return view('normaAuditoria.crear')->with(compact('macroProcesos'));
    }

    public function  guardar(Request $request){

        $normaCAuditoria = new Normativac();
        $normaCAuditoria -> tipoNormativa = $request->tipoNormativa;
         $normaCAuditoria -> fecha =$request->fecha;
          $normaCAuditoria -> nombre = $request->nombre;
         $normaCAuditoria   -> numero= $request->numero;
          $normaCAuditoria  -> codTipNorm = '1';
        $normaCAuditoria -> save();


        return redirect()->route('normaAuditoria.listarAplica')->with('success','Normativa Creada');;

    }

    public function editar(Request $request){

        $normasCAuditoria = Normativac::find($request->codNorm);

        return view('normaAuditoria.editar')->with(compact('normasCAuditoria'));
    }

    public function actualizar(Request $request){

        $normasCAuditoria = Normativac::find($request->codNorm);
        $normasCAuditoria->tipoNormativa = $request->tipoNormativa;
        $normasCAuditoria->nombre = $request->nombre;
        $normasCAuditoria->numero = $request->numero;
        $normasCAuditoria->fecha = $request->fecha;
        $normasCAuditoria->save();


        return redirect()->route('normaAuditoria.listarAplica');

    }
}
