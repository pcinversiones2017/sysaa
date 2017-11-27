<html>
<head>
<style>
    @page {
        margin: 100px 85px;
        font-size: 12px;
    }
    header {
        position: fixed;
        top: -60px;
        left: 0px; right: 0px;
        height: 60px;
        font-size: 10px;
        font-weight:bold;
    }
    footer {
        position: fixed;
        bottom: -60px; left: 0px; right: 0px; height: 40px;
        font-size: 10px;
        line-height: 50%;
        font-weight:bold;
    }
    span { page-break-after: always; }
    /*p:last-child { page-break-after: never; }*/

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table, th, td {
        border: 1px solid black;
    }

    th {
        height: 35px;
        /*padding-left: 5px;*/
        /*vertical-align: middle;*/
        text-align: center;

    }

    .th-center {
        background-color: #b90000;
        color: white;
    }
    td {
        padding: 5px;
        /*height: 20px;*/
    }
    hr {
        height: 2px;
        background-color: red;
    }

    thead:before, thead:after { display: none; }
    tbody:before, tbody:after { display: none; }

</style>
</head>
<body>

<header>
    {{--<img src="{{URL::to('img/logo.png')}}" width="50">--}}
    <p>PLAN DE AUDITORIA DEFINITIVO</p>
    <hr>
</header>
<footer>
    <hr>
    <p>{{strtoupper($auditoria->nombrePlanF)}}</p>
        <p>PERÍODO: 1 DE ENERO DE 2015 AL 31 DE DICIEMBRE DE 2015</p>
    <p style="text-align: center">“Decenio de las Personas con Discapacidad en el Perú”</p>
    <p style="text-align: center">“AÑO DE LA CONSOLIDACIÓN DEL MAR DE GRAU”</p>
</footer>

{{-- DATOS DE LA AUDITORIA--}}
<div>
    <p>PLAN DE AUDITORÍA DEFINITIVO</p>

    <p>AUDITORIA DE CUMPLIMIENTO</p>
    <p>{{$auditoria->entidadAuditada}}</p>
    <p>"{{$auditoria->nombrePlanF}}"</p>
    <p>PERIODO: {{$auditoria->periodoIniPlanF}} AL {{$auditoria->periodoFinPlanF}}</p>
</div>

<span></span>
{{-- INDICE --}}
<div>

    <div>
        <ul style="list-style-type: none">
            <li>I.    DATOS DE LA AUDITORÍA</li>
            <li>II.   ORIGEN</li>
            <li>III.  OBJETIVO GENERAL</li>
            <li>IV.   OBJETIVO(S) ESPECÍFICO(S) Y LA(S) MATERIA(S) A EXAMINAR</li>
            <li>V.    PERÍODO A EXAMINAR</li>
            <li>VI.   NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR</li>
            <li>VII.  NORMATIVA QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO</li>
            <li>VIII. COMISIÓN AUDITORA</li>
            <li>IX.   CRONOGRAMA Y PLAZOS DE ENTREGA DE LOS DOCUMENTOS</li>
            <li>X.    PROGRAMA DE AUDITORÍA</li>
            <li>XI.   FLUJO DE REVISIONES</li>
            <li>XII.  RELACIÓN DE APÉNDICES</li>
        </ul>
    </div>

</div>
<span></span>




{{-- DATOS DE LA AUDITORIA--}}
<div>
    <p style="text-align: center">PLAN DE AUDITORÍA DEFINITIVO</p>
    <p style="text-align: center">{{$auditoria->nombrePlanF}}</p>
    <table>
        <thead>
            <tr>
                <th colspan="2" class="th-center">I. DATOS DE AUDITORIA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    CÓDIGO DEL SERVICIO DE CONTROL POSTERIOR (AUTOGENERADO POR SCG)
                </td>
                <td>
                    TIPO DE DEMANDA DE CONTROL (DEMANDA AUTOGENERADA / DEMANDA IMPREVISIBLE)
                </td>
            </tr>
            <tr>
                <td>
                    TIPO DE SERVICIO DE CONTROL POSTERIOR
                </td>
                <td>
                    {{$auditoria->tipoServicioCP}}
                </td>
            </tr>
            <tr>
                <td>
                    ÓRGANO DE CONTROL INSTITUCIONAL
                </td>
                <td>
                    {{$auditoria->organoCI}}
                </td>
            </tr>
            <tr>
                <td>
                    ENTIDAD AUDITADA
                </td>
                <td>
                    {{$auditoria->entidadAuditada}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<br>
<br>

{{-- ORIGEN --}}
<div>
    <table>
        <thead>
            <tr>
                <th class="th-center">II. ORIGEN</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{$auditoria->origen}}
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<br>
{{-- OBJETIVO GENERAL --}}

<div>
    <table>
        <thead>
        <tr>
            <th class="th-center">III. OBJETIVO GENERAL</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{$auditoria->objetivoGeneral->nombre}}
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<br>

{{-- OBJETIVO(S) ESPECÍFICO(S) Y LA(S) MATERIA(S) A EXAMINAR --}}
{{--<div>--}}
    {{--<div style="width: 100%; border: 1px solid">--}}
        {{--IV. OBJETIVO(S) ESPECÍFICO(S) Y LA(S) MATERIA(S) A EXAMINAR--}}
    {{--</div>--}}
    {{--<div style="width: 20%; border: 1px solid; float: left">--}}
        {{--OBJETIVO ESPECÍFICO--}}
    {{--</div>--}}
    {{--<div style="width: 20%; border: 1px solid">--}}
        {{--MACROPROCESO--}}
    {{--</div>--}}
    {{--<div style="width: 20%; border: 1px solid">--}}
        {{--PROCESO--}}
    {{--</div>--}}
    {{--<div style="width: 20%; border: 1px solid">--}}
        {{--MATERIA(S) A EXAMINAR--}}
    {{--</div>--}}
{{--</div>--}}

    <table>
        <thead>
        <tr>
            <th colspan="4" class="th-center">IV. OBJETIVO(S) ESPECÍFICO(S) Y LA(S) MATERIA(S) A EXAMINAR</th>
        </tr>

        <tr>
            <th>
                OBJETIVO ESPECÍFICO
            </th>
            <th>
               MACROPROCESO
            </th>
            <th>
                PROCESO
            </th>
            <th>
                MATERIA(S) A EXAMINAR
            </th>
        </tr>

        </thead>
        <tbody>
        @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEspecifico)
        <tr>
            <td>
                {{$objetivoEspecifico->nombre}}
            </td>
            <td>
                {{$objetivoEspecifico->macroproceso->nombre}}
            </td>
            <td>
                <ul>
                @foreach($objetivoEspecifico->macroproceso->procesoMA as $proceso)
                <li>
                    {{$proceso->nombre}}
                </li>
                @endforeach
                </ul>
            </td>
            <td>
                {{$objetivoEspecifico->materia}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

<br>
<br>

{{-- ORIGEN --}}

    <table>
        <thead>
        <tr>
            <th colspan="4" class="th-center">V. PERÍODO A EXAMINAR</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                DESDE
            </td>
            <td>
                {{$auditoria->periodoIniPlanF}}
            </td>
            <td>
                HASTA
            </td>
            <td>
                {{$auditoria->periodoFinPlanF}}
            </td>
        </tr>
        </tbody>
    </table>

<br>
<br>

{{-- NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR--}}

    <table>
        <thead>
        <tr>
            <th colspan="5" class="th-center">VI. NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR</th>
        </tr>

        <tr>
            <th>
                TIPO
            </th>
            <th>
                NÚMERO
            </th>
            <th>
                NOMBRE DE NORMATIVA
            </th>
            <th>
                MACROPROCESO
            </th>
            <th>
                FECHA DE VIGENCIA
            </th>
        </tr>

        </thead>
        <tbody>
        @foreach($auditoria->normativas as $normativa)
            <tr>
                <td>
                    {{ \Styde\Html\Str::upper($normativa->tipoNormativa)}}
                </td>
                <td>
                    {{$normativa->numero}}
                </td>
                <td>
                    {{$normativa->nombre}}
                </td>
                <td>
                    {{$normativa->macroproceso->nombre}}
                </td>
                <td>
                    {{$normativa->fecha}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<br>
<br>
{{-- VII. NORMATIVA QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO--}}

    <table>
        <thead>
        <tr>
            <th colspan="4" class="th-center">VII. NORMATIVA QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO</th>
        </tr>

        <tr>
            <th>
                TIPO
            </th>
            <th>
                NÚMERO
            </th>
            <th>
                NOMBRE DE NORMATIVA
            </th>
            <th>
                FECHA DE VIGENCIA
            </th>
        </tr>

        </thead>
        <tbody>
        @foreach($normativas as $normativa)
            <tr>
                <td>
                    {{ \Styde\Html\Str::upper($normativa->tipoNormativa)}}
                </td>
                <td>
                    {{$normativa->numero}}
                </td>
                <td>
                    {{$normativa->nombre}}
                </td>
                <td>
                    {{$normativa->fecha}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


<br>

{{-- VIII. COMISIÓN AUDITORA --}}

    <table>
        <thead>
        <tr>
            <th colspan="4" class="th-center">VIII. COMISIÓN AUDITORA</th>
        </tr>

        <tr>
            <th>
                NOMBRES Y APELLIDOS
            </th>
            <th>
                ROL EN LA COMISIÓN
            </th>
            <th>
                CORREO ELECTRÓNICO
            </th>
            <th>
                H/H
            </th>
        </tr>

        </thead>
        <tbody>
        @foreach($auditoria->comision as $usuariorol)
            <tr>
                <td>{!! $usuariorol->usuario->datos !!}</td>
                <td>{!! $usuariorol->rol->nombre !!}</td>
                <td>{!! $usuariorol->usuario->persona->email !!}</td>
                <td>{!! $usuariorol->horasH !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

<br>
<br>

{{--IX. CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS (*)--}}
<table>
    <thead>
    <tr>
        <th colspan="4" class="th-center">
            IX. CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS
        </th>
    </tr>
    <tr>
        <th>ACTIVIDADES</th>
        <th>FECHA INICIO</th>
        <th>FECHA FIN</th>
        <th>DÍAS HÁBILES</th>
    </tr>
    </thead>
    <tbody>
    <?php $aux = '' ?>
    @foreach($auditoria->cronogramaGeneral as $cronograma)
        @if($cronograma->etapa->tipo != $aux)
            <tr><td>
                    <label class="has-success">{{$cronograma->etapa->tipo}}</label>
                </td>
                @if($cronograma->etapa->tipo == \App\Models\Etapa::PLANIFICACION)
                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[0]->fecha_ini ?? '' !!}</label></td>
                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[3]->fecha_fin ?? '' !!}</label></td>
                @elseif($cronograma->etapa->tipo == \App\Models\Etapa::EJECUCION)
                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[4]->fecha_ini ?? '' !!}</label></td>
                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[4]->fecha_fin ?? '' !!}</label></td>
                @else
                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[5]->fecha_ini ?? '' !!}</label></td>
                    <td style="text-align: center"><label class="has-success">{!! $auditoria->cronogramaGeneral[5]->fecha_fin ?? '' !!}</label></td>
                @endif
                <td></td>
            </tr>
            <?php $aux = $cronograma->etapa->tipo?>
        @endif
        <tr>
            <td>{!! nl2br($cronograma->etapa->nombre) !!}</td>
            <td width="15%" style="vertical-align: middle; text-align: center;">{!! $cronograma->fecha_ini !!}</td>
            <td width="15%" style="vertical-align: middle; text-align: center">{!! $cronograma->fecha_fin !!}</td>
            <td style="vertical-align: middle; text-align: center">{!! $cronograma->dias_habiles !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{--X. PROGRAMA DE AUDITORÍA--}}
<table>
    <thead>
    <tr>
        <th colspan="3">
            X. PROGRAMA DE AUDITORÍA
        </th>
    </tr>
    <tr>
        <td>INICIALES DEL AUDITOR</td>
        <td>PROCEDIMIENTOS DE AUDITORIA</td>
        <td>TERMINADO</td>
    </tr>

    </thead>
    <tbody>
    <?php $i=1 ; ?>
    @foreach($auditoria->objetivoGeneral->procedimientos as $row)
        <tr>
            <td>{{$row->codusurol->usuario->iniciales}}</td>
            <td>{{$row->justificacion}}</td>
            <td>{{$row->detalle}}</td>
            <td class="tooltip-demo" style="text-align: center">
                <a href="{!! url('procedimiento-general/editar/'.$auditoria->codPlanF.'/'.$row->codProc) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="{{route('procedimiento-general.eliminar', $row->codProc )}}" class="btn btn-danger btn-outline eliminar-objetivo-general" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $i++ ?>
    @endforeach
    </tbody>
</table>


</body>
</html>