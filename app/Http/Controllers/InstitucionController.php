<?php

namespace App\Http\Controllers;

use App\Models\Info_Software;
use App\Models\Institucion;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class InstitucionController extends Controller
{
    public function listar()
    {
        $instituciones = Institucion::all();
        RegistrarActividad(Institucion::TABLA,Historial::LEER,'vió el listado de Instituciones');
        return view('institucion.listar')->with(compact('instituciones'));
    }

    public function editar(Request $request)
    {

        $instituciones = Institucion::find($request->codInstitucion);
        RegistrarActividad(Institucion::TABLA,Historial::EDITAR,'vió el formulario de editar Institucion '.$instituciones->nombre);
        return view('institucion.editar')->with(compact('instituciones'));
    }
    public function actualizar(Request $request)
    {

        $instituciones = Institucion::find($request->codInstitucion);
        $instituciones->nombreInstitucion = $request->nombreInstitucion;
        $instituciones->save();
        return redirect()->route('institucion.listar');
    }

    public function listarSoftware()
    {

        $software = Info_Software::all();
        return view('institucion.listarSoftware')->with(compact('software'));;
    }



}
