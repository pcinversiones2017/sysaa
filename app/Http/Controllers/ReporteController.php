<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 27/11/17
 * Time: 10:06 AM
 */

namespace App\Http\Controllers;


use App\Models\Auditoria;
use App\Models\Informe;
use App\Models\Institucion;
use App\Models\Normativa;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Jenssegers\Date\Date;

class ReporteController extends Controller
{

    public function planificacion(Request $request)
    {

        $auditoria = Auditoria::find($request->codPlanF);
        $normativas = Normativa::where('codTipNorm', 2)->get();
        $institucion = Institucion::find(1);
        Date::setLocale('es');
        $periodo = Date::parse($auditoria->periodoIniPlanF)->format('d \d\e F \d\e\l Y') . ' AL '
            . Date::parse($auditoria->periodoFinPlanF)->format('d \d\e F \d\e\l Y') ;

        $pdf = App::make('dompdf.wrapper');
        $view = view('reportes.auditoria.planificacion', compact('auditoria', 'normativas', 'institucion', 'periodo'));
        //return $view;
        $pdf->loadHtml($view);
        return $pdf->stream();

    }

    public function informeFinal(Request $request)
    {
        $informe = Informe::where('codPlanF', $request->codPlanF)->first();
        $pdf = App::make('dompdf.wrapper');

        //return $view;
        $pdf->loadHtml($informe->informe);
        return $pdf->stream();
    }
}