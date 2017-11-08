<?php

namespace App\Http\Controllers\Jefe_Comision;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Procedimiento;
use App\Models\Historial;
use Auth;

class ProcedimientoController extends Controller
{
    public function aprobar($id)
    {
        Procedimiento::existe($id)->update(['fecha_terminado' => date("Y-m-d"), 'fecha_aprobado' => date("Y-m-d"), 'codEst' => 4]);
        return redirect('/')->with('success', 'Procedimiento Aprobado');
    }

    public function rechazar($id)
    {
        Procedimiento::existe($id)->update(['fecha_terminado' => date("Y-m-d"), 'fecha_rechazado' => date("Y-m-d"), 'codEst' => 5]);
        return redirect('/')->with('danger', 'Procedimiento Rechazado');
    }
}
