<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 16/11/17
 * Time: 03:56 PM
 */

namespace App\Http\Controllers;


use App\Http\Requests\Usuario\RegistroRequest;
use App\Models\Historial;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function listar()
    {
        $personas = Persona::all();
        $persona = 'active';
        return view('persona.listar', compact('personas', 'persona'));
    }

    public function crear()
    {
        return view('persona.crear');
    }

    public function editar(Request $request)
    {
        $persona = Persona::find($request->codPer);
        return view('persona.editar', compact('persona'));
    }

    public function guardar(RegistroRequest $request)
    {

        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->email = $request->email;
        $persona->save();

        RegistrarActividad(Persona::TABLA,Historial::REGISTRAR,'registró el Usuario ' . $request->nombres);
        return redirect()->route('persona.listar')->with('success','Persona registrada');
    }

    public function actualizar(Request $request)
    {
        $persona = Persona::find($request->codPer);
        $persona->nombres = $request->nombres;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->email = $request->email;
        $persona->save();

        RegistrarActividad(Persona::TABLA,Historial::REGISTRAR,'Actualizó el Usuario ' . $request->nombres);
        return redirect()->route('persona.listar')->with('success','Persona actualizada');
    }
}