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

        $institucionn = 'active';
        $institucion = Institucion::find($request->codIns);

        RegistrarActividad(Institucion::TABLA,Historial::EDITAR,'vió el formulario de editar Institucion ' . $institucion->nombre);
        return view('institucion.editar')->with(compact('institucion', 'institucionn'));
    }
    public function actualizar(Request $request)
    {

        $institucion = Institucion::find($request->codIns);
        $institucion->nombre = $request->nombre;
        $institucion->direccion = $request->direccion;
        $institucion->ruc = $request->ruc;
        $institucion->telefono = $request->telefono;
        $institucion->denominacion_anio = $request->denominacion_anio;
        $institucion->organo_control = $request->organo_control;
        $institucion->save();
        return redirect()->route('institucion.listar')->with('success', 'Se actualizo correctamente');
    }

    public function listarSoftware()
    {
        $software_a = 'active';
        $software = Info_Software::all();
        return view('institucion.listarSoftware')->with(compact('software', 'software_a'));;
    }



}
