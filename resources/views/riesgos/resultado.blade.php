@extends('layout.admin')

@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop

@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            BUSCAR RIESGO POR AUDITORIA
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            	{!! Form::open(['method' => 'POST', 'route' => 'riesgos.buscar']) !!}
                                <div class="col-sm-11">
                                    {!! Form::select('auditoria', $auditorias, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE AUDITORIA']) !!}
                                </div>
                                <div class="col-sm-1">
                                    {!! Form::submit('BUSCAR', ['class' => 'btn btn-primary btn-outline']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <hr>
                            <div class="row">
                            	@foreach($auditoria as $n => $row)
                                <div class="col-sm-12" align="center">
                                    <h2><strong>{!! $row->nombrePlanF !!}</strong> - RIESGOS</h2>
                                    <hr>
                                </div>
                                <div class="col-sm-12" align="rigth">
                                	<label>ORIGEN</label><br>
                                    {!! $row->origen !!}
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> PROCESOS</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"> SUBPROCESOS</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3"> PROCEDIMIENTOS </a></li>

                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                    <table class="table table-bordered table-procesos" style="margin-top: 10px">
	                                    <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>Proceso</th>
	                                        <th>Riesgo</th>
	                                        <th>Ponderacion</th>
	                                    </tr>
	                                    </thead>
	                                    <tbody>
	                                    @foreach($proceso_ma as $n => $row)
	                                        <tr>
	                                            <td align="middle">{{$n+1}}</td>
	                                            <td>{{$row->pronom}}</td>
	                                            <td>{{$row->prorie}}</td>
	                                            <td>
	                                            	@if($row->propon == 'ALTO')
	                                            	<span class="label label-danger">{{$row->propon}}</span>
	                                            	@elseif($row->propon == 'MEDIO')
	                                            	<span class="label label-warning">{{$row->propon}}</span>
	                                            	@else
	                                            	<span class="label label-success">{{$row->propon}}</span>
	                                            	@endif
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                    </tbody>
	                                </table>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                    <table class="table table-bordered table-subprocesos" style="margin-top: 10px">
	                                    <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>SubProceso</th>
	                                        <th>Riesgo</th>
	                                        <th>Ponderacion</th>
	                                    </tr>
	                                    </thead>
	                                    <tbody>
	                                    @foreach($subproceso as $n => $row)
	                                        <tr>
	                                            <td align="middle">{{$n+1}}</td>
	                                            <td>{{$row->subnom}}</td>
	                                            <td>{{$row->subrie}}</td>
	                                            <td>
	                                            	@if($row->subpon == 'ALTO')
	                                            	<span class="label label-danger">{{$row->subpon}}</span>
	                                            	@elseif($row->subpon == 'MEDIO')
	                                            	<span class="label label-warning">{{$row->subpon}}</span>
	                                            	@else
	                                            	<span class="label label-success">{{$row->subpon}}</span>
	                                            	@endif
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                    </tbody>
	                                </table>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                    <table class="table table-bordered table-procedimientos" style="margin-top: 10px">
	                                    <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>Procedimiento</th>
	                                        <th>Riesgo</th>
	                                        <th>Ponderacion</th>
	                                    </tr>
	                                    </thead>
	                                    <tbody>
	                                    @foreach($procedimiento_sp as $n => $row)
	                                        <tr>
	                                            <td align="middle">{{$n+1}}</td>
	                                            <td>{{$row->prospnom}}</td>
	                                            <td>{{$row->prosprie}}</td>
	                                            <td>
	                                            	@if($row->prosppon == 'ALTO')
	                                            	<span class="label label-danger">{{$row->prosppon}}</span>
	                                            	@elseif($row->prosppon == 'MEDIO')
	                                            	<span class="label label-warning">{{$row->prosppon}}</span>
	                                            	@else
	                                            	<span class="label label-success">{{$row->prosppon}}</span>
	                                            	@endif
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                    </tbody>
	                                </table>
                                </div>
                            </div>
                        </div>


                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}

    <script>
        $(document).ready(function(){
            $('.table-procesos').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Riesgos de Procesos'},
                    {extend: 'pdf', title: 'Lista de Riesgos de Procesos'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
    <script>
        $(document).ready(function(){
            $('.table-subprocesos').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Riesgos de Subprocesos'},
                    {extend: 'pdf', title: 'Lista de Riesgos de Subprocesos'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
    <script>
        $(document).ready(function(){
            $('.table-procedimientos').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Riesgos de Procedimiento'},
                    {extend: 'pdf', title: 'Lista de Riesgos de Procedimiento'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>

@stop