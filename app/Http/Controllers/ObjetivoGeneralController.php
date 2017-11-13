<?php

namespace App\Http\Controllers;


use App\Models\ObjetivoGeneral;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class ObjetivoGeneralController extends Controller
{

    public function crear($codPlanF)
    {
        try{
            RegistrarActividad(ObjetivoGeneral::TABLA,Historial::CREAR,'vió el formulario de crear Objetivo Especifico');
            return view('objetivo_general.crear', compact('codPlanF', 'auditoria'));
        }catch (\Exception $e){

        }
    }

    public function guardar(Request $request)
    {
        $objetivoGeneral = new ObjetivoGeneral();
        $objetivoGeneral->nombre = $request->nombre;
        $objetivoGeneral->codPlanF = $request->codPlanF;
        $objetivoGeneral->save();
        RegistrarActividad(ObjetivoGeneral::TABLA,Historial::REGISTRAR,'registró el Objetivo General '.$request->nombre);

        return redirect('auditoria/mostrar/' . $request->codPlanF)->with('success', 'Se registró el Objetivo General');
    }

    public function editar($codPlanF, $codObjGen)
    {
        try{
            $objetivoGeneral = ObjetivoGeneral::find($codObjGen);
            RegistrarActividad(ObjetivoGeneral::TABLA,Historial::EDITAR,'vió el formulario de editar el Objetivo General ' . substr($objetivoGeneral->nombre, 0, 50));
            return view('objetivo_general.editar', compact('objetivoGeneral'));
        }catch (\Exception $e){

        }
    }

    public function actualizar(Request $request)
    {
        try{
            $objetivoGeneral             = ObjetivoGeneral::find($request->codObjGen);
            $objetivoGeneral->nombre     = $request->nombre;
            $objetivoGeneral->save();
            $animate = '#objetivo-general';

            RegistrarActividad(ObjetivoGeneral::TABLA,Historial::ACTUALIZAR,'actualizó el Objetivo General ' . substr($request->nombre, 0, 50));

            return redirect()->route('auditoria.mostrar', $request->codPlanF)
                ->with('success', 'Objetivo general actualizado')
                ->with('animate',$animate);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function eliminar($id)
    {
    	$objetivoGeneral = ObjetivoGeneral::find($id);
    	$objetivoGeneral->delete();
    	RegistrarActividad(ObjetivoGeneral::TABLA,Historial::ELIMINAR,'eliminó el Objetivo General '.$objetivoGeneral->nombre);
    	return back()->with('danger', 'Objetivo General eliminado');
    }
}