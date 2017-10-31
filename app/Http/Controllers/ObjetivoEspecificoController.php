<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 17:52
 */

namespace App\Http\Controllers;

use App\Models\ObjetivoEspecifico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ObjetivoEspecificoController extends Controller
{
    public function guardar(Request $request)
    {
        try{
            $objetivoEspecifico = new ObjetivoEspecifico();
            $objetivoEspecifico->nombre = $request->nombre;
            $objetivoEspecifico->materia = $request->materia;
            $objetivoEspecifico->codMacroP = $request->codMacroP;
            $objetivoEspecifico->codObjGen = $request->codObjGen;
            $objetivoEspecifico->save();
            return redirect('auditoria/mostrar/' . $request->codPlanF . '#tab-2');
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function mostrar(Request $request)
    {
        try{
            $objetivoEspecifico = ObjetivoEspecifico::find($request->codObjEsp);
            return view('objetivo_especifico.mostrar', compact('objetivoEspecifico'));
        
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function ajaxGetObjetivoEspecifico(Request $request)
    {
        try{
            $objetivoEspecifico = ObjetivoEspecifico::find($request->codObjEsp);
            return response()->json($objetivoEspecifico);

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function listar()
    {
        
    }
}