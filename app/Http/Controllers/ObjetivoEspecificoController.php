<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjetivoEspecifico\RegistroRequest;
use App\Models\Auditoria;
use App\Models\Macroproceso;
use App\Models\ObjetivoEspecifico;
use App\Models\ObjetivoGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Procedimiento;

class ObjetivoEspecificoController extends Controller
{
    public function guardar(RegistroRequest $request)
    {
        try{
            $objetivoEspecifico             = new ObjetivoEspecifico();
            $objetivoEspecifico->nombre     = $request->nombre;
            $objetivoEspecifico->materia    = $request->materia;
            $objetivoEspecifico->codMacroP  = $request->codMacroP;
            $objetivoEspecifico->codObjGen  = $request->codObjGen;
            $objetivoEspecifico->save();
            return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success', 'Objetivo especifico registrado');

        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function crear(Request $request)
    {
        try{
            $macroprocesos = Macroproceso::all();
            $auditoria = Auditoria::find($request->codPlanF);
            return view('objetivo_especifico.crear', compact('macroprocesos', 'auditoria'));
        }catch (\Exception $e){

        }
    }

    public function editar(Request $request)
    {
        try{
            $macroprocesos = Macroproceso::all();
            $objetivoEspecifico = ObjetivoEspecifico::find($request->codObjEsp);

            return view('objetivo_especifico.editar', compact('macroprocesos', 'objetivoEspecifico'));
        }catch (\Exception $e){

        }
    }

    public function actualizar(Request $request)
    {
        try{
            $objetivoEspecifico             = ObjetivoEspecifico::find($request->codObjEsp);
            $objetivoEspecifico->nombre     = $request->nombre;
            $objetivoEspecifico->materia    = $request->materia;
            $objetivoEspecifico->codMacroP  = $request->codMacroP;
            $objetivoEspecifico->save();

            return redirect()->route('auditoria.mostrar', $objetivoEspecifico->objetivoGeneral->auditoria->codPlanF)
                ->with('success', 'Objetivo especifico actualizado');
        }catch (\Exception $e){
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function mostrar(Request $request)
    {
        try{

            $objetivoEspecifico = ObjetivoEspecifico::find($request->codObjEsp);

            $procedimiento = Procedimiento::join('usuario_roles','usuario_roles.codUsuRol','=','procedimiento.codUsuRol')
                                            ->join('users','users.codUsu','=','usuario_roles.codUsu')
                                            ->where('codObjEsp',$request->codObjEsp)
                                            ->get();
            $codPlanF = $request->codPlanF;
            $codObjEsp = $request->codObjEsp;
            return view('objetivo_especifico.mostrar', compact(['objetivoEspecifico','procedimiento','codPlanF','codObjEsp']));
        
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

    public function eliminar(Request $request)
    {
        try{
            $objetivoEspecifico = ObjetivoEspecifico::find($request->codObjEsp);
            $codPlanF = $objetivoEspecifico->objetivoGeneral->auditoria->codPlanF;
            $objetivoEspecifico->delete();

            return redirect()->route('auditoria.mostrar', $codPlanF)->with('success', 'Objetivo especifico eliminado');
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }


    }
}