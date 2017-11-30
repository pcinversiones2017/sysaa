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
        .p-void{
            page-break-inside: auto;
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
        .indice > li {
            list-style-type: square;
            /*margin: 0 0 5px 25px;*/
            margin-bottom: 15px;
            font-size: 15px;
        }



        thead:before, thead:after { display: none; }
        tbody:before, tbody:after { display: none; }

    </style>
</head>
<body>
<header>
    {{--<img src="{{URL::to('img/logo.png')}}" width="50">--}}
    <p>INFORME DE AUDITORIA</p>
    <hr>
</header>
<footer>
    <hr>
    <p>{{strtoupper($auditoria->nombrePlanF)}}</p>
    <p>PERÍODO: {{ strtoupper($periodo) }} </p>
    <p style="text-align: center">“{{$institucion->denominacion_anio}}”</p>
</footer>

<div style="text-align: center; margin-top: 200px">
    <p style="font-size: 20px">{{ $auditoria->organoCI }}</p>
    <p style="font-size: 25px"><u>INFORME DE AUDITORIA</u></p><br><br>

    <p style="font-size: 20px">AUDITORIA DE CUMPLIMIENTO</p>
    <p style="font-size: 20px">{{$auditoria->entidadAuditada}}</p><br><br>
    <p style="font-size: 20px">"{{$auditoria->nombrePlanF}}"</p><br><br>
    <p style="font-size: 18px">PERIODO: DEL {{strtoupper($periodo)}}</p>
</div>
<span></span>
{{-- INDICE --}}
<div style="margin-top: 100px">
    <div  style="text-align: center;">
        <p style="font-size: 25px"><u>INFORME DE AUDITORIA</u></p><br>
        <p style="font-size: 20px">"{{$auditoria->nombrePlanF}}"</p><br><br>
        <p style="font-size: 20px">ÍNDICE</p><br>
    </div>
    <div>
        <ul class="indice">
            <li>I.    ANTECEDENTES</li>
            <ul>
                <li>1. ORIGEN</li>
                <li>2. OBJETIVOS</li>
                <li>3. MATERIA EXAMINADA Y DE ALCANCE</li>
                <li>4. ANTECEDENTES Y BASE LEGAL</li>
            </ul>
            <li>II.   DEFICIENCIAS DE CONTROL INTERNO</li>
            <li>III.  OBSERVACIONES</li>
            <li>IV.   CONCLUSIONES</li>
            <li>V.    RECOMENDACIONES</li>
            <li>VI.   APÉNDICES</li>

        </ul>
    </div>
</div>
<span></span>
<div>
    <div  style="text-align: center;">
        <p style="font-size: 25px"><u>INFORME DE AUDITORIA</u></p><br>
        <p style="font-size: 20px">"{{$auditoria->nombrePlanF}}"</p><br><br>
    </div>
    <div>
        <strong>I. ANTECEDENTES</strong>
        <br>
        <strong style="margin-left: 15px">1. ORIGEN</strong>
        <br>
        <p style="margin-left: 30px">{{ $auditoria->origen }}</p>
        <br><br>
        <strong style="margin-left: 15px">2. OBJETIVOS</strong><br>
        <strong style="margin-left: 30px">2.1 OBJETIVOS GENERAL</strong><br>
        <p style="margin-left: 30px">
            {{$auditoria->objetivoGeneral->nombre}}
        </p>
        <strong style="margin-left: 30px">2.2 OBJETIVOS ESPECIFICOS</strong><br>
        <ul>
            @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEspecifico)
                <li>{{$objetivoEspecifico->nombre}}</li>
            @endforeach
        </ul>
        <strong style="margin-left: 15px">3. MATERIA A EXAMINAR</strong>
        <br><br>
        <strong style="margin-left: 15px">4. ANTECEDENTES Y BASE LEGAL DE LA ENTIDAD</strong>
        <br><br>
        <div class="p-void">
            <table>
                <thead>
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
        </div>
        <br>
        <strong>III. OBSERVACIONES</strong>
        <br>
        <ul>
            @foreach($auditoria->objetivoGeneral->procedimientos as $procedimiento)
                @if(isset($procedimiento->desarrollo))
                    @foreach($procedimiento->desarrollo->observacion as $observacion)
                        <li style="padding-bottom: 5px">
                            {{$observacion->descripcion}}
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>

        <strong>V. RECOMENDACIONES</strong>
        <ul>
            @foreach($auditoria->objetivoGeneral->procedimientos as $procedimiento)
                @if(isset($procedimiento->desarrollo))
                    @foreach($procedimiento->desarrollo->observacion as $observacion)
                        <li style="padding-bottom: 5px">
                            {{$observacion->recomendacion}}
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>


