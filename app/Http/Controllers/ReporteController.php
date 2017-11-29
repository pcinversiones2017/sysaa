<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 27/11/17
 * Time: 10:06 AM
 */

namespace App\Http\Controllers;


use App\Models\Auditoria;
use App\Models\Normativa;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReporteController extends Controller
{

    public function planificacion(Request $request)
    {

        $auditoria = Auditoria::find($request->codPlanF);
        $normativas = Normativa::where('codTipNorm', 2)->get();
        $pdf = App::make('dompdf.wrapper');
        $view = view('reportes.auditoria.planificacion', compact('auditoria', 'normativas'));
        //return $view;
        $pdf->loadHtml($view);
        return $pdf->stream();

    }
}