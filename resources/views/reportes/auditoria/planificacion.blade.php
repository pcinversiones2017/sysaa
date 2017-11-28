<html>
<head>
<style>
    @page {
        margin: 100px 80px;
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
        bottom: -60px; left: 0px; right: 0px; height: 60px;
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
        background-color: #3e596e;
        color: white;
    }
    td {
        padding: 5px;
        /*height: 20px;*/
    }
    hr {
        height: 2px;
        background-color: #3e596e;
    }

    .p-break{
        height: 25px;
    }
    /*ul li {*/
        /*list-style-type: square;*/
        /*!*margin: 0 0 5px 25px;*!*/
        /*!*margin-bottom: 15px;*!*/
        /*font-size: 15px;*/
    /*}*/

    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border: solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
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
<div style="text-align: center;">
    <p style="font-size: 20px">{{ $auditoria->organoCI }}</p>
    <p style="font-size: 25px"><u>PLAN DE AUDITORÍA DEFINITIVO</u></p><br><br>

    <p style="font-size: 20px">AUDITORIA DE CUMPLIMIENTO</p>
    <p style="font-size: 20px">{{$auditoria->entidadAuditada}}</p><br><br>
    <p style="font-size: 20px">"{{$auditoria->nombrePlanF}}"</p><br><br>
    <p style="font-size: 18px">PERIODO: {{$auditoria->periodoIniPlanF}} AL {{$auditoria->periodoFinPlanF}}</p>
</div>

<span></span>
{{-- INDICE --}}
<div>

    <div  style="text-align: center;">
        <p style="font-size: 25px"><u>PLAN DE AUDITORÍA DEFINITIVO</u></p><br>
        <p style="font-size: 20px">"{{$auditoria->nombrePlanF}}"</p><br><br>
        <p style="font-size: 20px">ÍNDICE</p><br>
    </div>
    <div>
        <ul>
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
    <p style="text-align: center; font-size: 15px">PLAN DE AUDITORÍA DEFINITIVO</p>
    <p style="text-align: center; font-size: 15px">{{$auditoria->nombrePlanF}}</p>
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
<div class="p-break"></div>

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
<div class="p-break"></div>
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
<div class="p-break"></div>

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

    <div class="">
        IV. OBJETIVO(S) ESPECÍFICO(S) Y LA(S) MATERIA(S) A EXAMINAR
    </div>

<div class="Table">
    <div class="Heading">
        <div class="Cell">
            <p>OBJETIVO ESPECÍFICO</p>
        </div>
        <div class="Cell">
            <p>MACROPROCESO</p>
        </div>
        <div class="Cell">
            <p>PROCESO</p>
        </div>
        <div class="Cell">
            <p>MATERIA(S) A EXAMINAR</p>
        </div>
    </div>
    @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEspecifico)
        <div class="Row">
            <div class="Cell">
                <p>{{$objetivoEspecifico->nombre}}</p>
            </div>
            <div class="Cell">
                <p>{{$objetivoEspecifico->macroproceso->nombre}}</p>
            </div>
            <div class="Cell">
                <p>
                <ul style="margin-top: 20px">
                    @foreach($objetivoEspecifico->macroproceso->procesoMA as $proceso)
                        <li>
                            {{$proceso->nombre}}
                        </li>
                    @endforeach
                </ul>
                </p>
            </div>
            <div class="Cell">
                <p>{{$objetivoEspecifico->materia}}</p>
            </div>
        </div>
    @endforeach
</div>


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

<div class="p-break"></div>

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

<div class="p-break"></div>

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

<div class="p-break"></div>
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

<div class="p-break"></div>

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

<div class="p-break"></div>

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

<div class="p-break"></div>


{{--X. PROGRAMA DE AUDITORÍA--}}
<table>
    <thead>
    <tr>
        <th colspan="8" class="th-center">
            X. PROGRAMA DE AUDITORÍA
        </th>
    </tr>
    <tr>
        <th>INICIALES DEL AUDITOR</th>
        <th colspan="4">PROCEDIMIENTOS DE AUDITORIA</th>
        <th>FECHA CONCLUSIÓN</th>
        <th>HECHO POR</th>
        <th>REF. DOC.</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td>
        </td>
        <td>OBJETIVO GENERAL</td>
        <td>{{ \Illuminate\Support\Str::ucfirst(\Illuminate\Support\Str::lower($auditoria->objetivoGeneral->nombre))}}</td>
        <td>MATERIA(S) A EXAMINAR</td>
        <td>-</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php $i=1 ; ?>
    @foreach($auditoria->objetivoGeneral->procedimientos as $row)
        <tr>
            <td>
                {{$row->codusurol->usuario->iniciales}}
            </td>
            <td colspan="4">
                <strong>PROCEDIMIENTO N°{{$i}}</strong><br>
                <strong>JUSTIFICACIÓN</strong><br>
                {{$row->justificacion}}<br>
                <strong>DETALLE</strong><br>
                {{$row->detalle}}
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php $i++ ?>
    @endforeach

    @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEspecifico)
       <tr>
            <td></td>
            <td>OBJETIVO ESPECÍFICO</td>
            <td>{{ \Illuminate\Support\Str::ucfirst(\Illuminate\Support\Str::lower($objetivoEspecifico->nombre))}}</td>
            <td>MATERIA(S) A EXAMINAR</td>
            <td>{{$objetivoEspecifico->materia}}</td>
            <td></td>
            <td></td>
            <td></td>
       </tr>
        @foreach($objetivoEspecifico->procedimientos as $procedimiento)
            <tr>
                <td>
                    {{$procedimiento->codusurol->usuario->iniciales}}
                </td>
                <td colspan="4">
                    <strong>PROCEDIMIENTO N°{{$i}}</strong><br>
                    <strong>JUSTIFICACIÓN</strong><br>
                    {{$procedimiento->justificacion}}<br>
                    <strong>DETALLE</strong><br>
                    {{$procedimiento->detalle}}
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php $i++ ?>
        @endforeach
    @endforeach
</tbody>
</table>


</body>
</html>