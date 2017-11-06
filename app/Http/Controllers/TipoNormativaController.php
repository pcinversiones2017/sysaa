<?php

namespace App\Http\Controllers;

use App\Models\TipoNormativa;
use Illuminate\Http\Request;
use App\Models\Historial;
use Auth;

class TipoNormativaController extends Controller
{
    public function listar()
    {
        $tipoNormativas = TipoNormativa::all();
        $listarTipoNormativa = 'active';
        RegistrarActividad(TipoNormativa::TABLA,Historial::LEER,'vió el listado de Tipos de Normativas');
        return view('tipo_normativa.listar')->with(compact('tipoNormativas', 'listarTipoNormativa' ));
    }

    public function crear()
    {
        $tipoNormativas = 'active';
        RegistrarActividad(TipoNormativa::TABLA,Historial::CREAR,'vió el formulario de crear Tipo Normativa');
        return view('tipo_normativa.crear')->with(compact('tipoNormativas'));
    }

    public function guardar(Request $request)
    {
        $tipoNormativa = new TipoNormativa();
        $tipoNormativa->nombre = $request->nombre;
        $tipoNormativa->estado = 'activo';
        $tipoNormativa->save();
        RegistrarActividad(TipoNormativa::TABLA,Historial::REGISTRAR,'registró Tipo Normativa '.$request->nombre);

        return redirect('tipo_normativa/listar');
    }

    public function editar(Request $request)
    {
        $tipoNormativa = TipoNormativa::find($request->codTipNorm);
        RegistrarActividad(TipoNormativa::TABLA,Historial::EDITAR,'vió el formulario de editar Tipo Normativa '.$actividad->nombre);
        return view('tipo_normativa.editar')->with(compact('tipoNormativa'));
    }

    public function actualizar(Request $request)
    {
        $tipoNormativa = TipoNormativa::find($request->codTipNorm);
        $tipoNormativa->nombre = $request->nombre;
        $tipoNormativa->save();
        RegistrarActividad(TipoNormativa::TABLA,Historial::ACTUALIZAR,'actualizó Tipo Normativa '.$request->nombre);

        return redirect('tipo_normativa/listar');
    }

}
