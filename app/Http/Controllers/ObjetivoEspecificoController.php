<?php
/**
 * Created by PhpStorm.
 * User: Programador1
 * Date: 25/10/2017
 * Time: 17:52
 */

namespace App\Http\Controllers;

use App\Http\Requests\ObjetivoEspecifico\RegistroRequest;
use App\Models\Auditoria;
use App\Models\Macroproceso;
use App\Models\ObjetivoEspecifico;
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
            return redirect()->route('auditoria.mostrar', $request->codPlanF)->with('success', 'Objetivo Especifico Registrado');

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

            return redirect()->route('auditoria.mostrar', $objetivoEspecifico->objetivoGeneral->auditoria->codPlanF)->with('success', 'Objetivo especifico actualizado');
        }catch (\Exception $e){
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function mostrar($codObjEsp, $codPlanF)
    {
        try{

            $objetivoEspecifico = ObjetivoEspecifico::find($codObjEsp);

            $procedimiento = Procedimiento::join('usuario_roles','usuario_roles.codUsuRol','=','procedimiento.codUsuRol')
                                            ->join('users','users.codUsu','=','usuario_roles.codUsu')
                                            ->where('codObjEsp', $codObjEsp)
                                            ->get();
            $codPlanF = $codPlanF;
            return view('objetivo_especifico.mostrar', compact(['objetivoEspecifico','procedimiento','codPlanF']));
        
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