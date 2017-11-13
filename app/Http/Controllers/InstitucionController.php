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
        $institucion = 'active';
        $institucionn = Institucion::find(1);
        RegistrarActividad(Institucion::TABLA,Historial::LEER,'vió el listado de Instituciones');
        return view('institucion.listar')->with(compact('institucionn', 'institucion'));
    }

    public function editar(Request $request)
    {

        $institucion = Institucion::find($request->codIns);

        RegistrarActividad(Institucion::TABLA,Historial::EDITAR,'vió el formulario de editar Institucion ' . $institucion->nombre);
        return view('institucion.editar')->with(compact('institucion'));
    }
    public function actualizar(Request $request)
    {

        $instituciones = Institucion::find($request->codIns);
        $instituciones->nombreInstitucion = $request->nombre;
        $instituciones->save();
        return redirect()->route('institucion.listar');
    }

    public function listarSoftware()
    {
        $software_a = 'active';
        $software = Info_Software::all();
        return view('institucion.listarSoftware')->with(compact('software', 'software_a'));;
    }



}
