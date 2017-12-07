@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
@section('content')
    @include('partials.alert')
    <div class="row">
        <div class="row wrapper border-bottom white-bg page-heading">

        </div>
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>GENERAR PROCEDIMIENTOS</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="{!! route('macroproceso.listar') !!}">MACROPROCESO</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('macroproceso/mostrar')}}/{{$procedimientosp->subProceso->procesoMA->codMacroP}}">PROCESO</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('procesoma/mostrar')}}/{{$procedimientosp->subProceso->codProMA}}">SUBPROCESO</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('subproceso/mostrar')}}/{{$procedimientosp->subProceso->codSubPro}}">PROCEDIMIENTO</a>
                                    </li>
                                    <li class="active">
                                        <strong>CREAR ACTIVIDADES</strong>
                                    </li>
                                </ol>
                            </div>
                            {!! Field::text('MACROPROCESO', $procedimientosp->subProceso->procesoMA->macroProceso->nombre,['readonly' => 'true']) !!}
                            {!! Field::text('PROCESO', $procedimientosp->subProceso->procesoMA->nombre,['readonly' => 'true']) !!}
                            {!! Field::text('SUBPROCESO', $procedimientosp->subProceso->nombre,['readonly' => 'true']) !!}
                            {!! Field::text('PROCEDIMIENTO', $procedimientosp->nombre,['readonly' => 'true']) !!}
                        </div>
                        <div class="m-b-md">
                            {!! Form::open(['method' => 'POST', 'route' => 'actividad.guardar']) !!}
                            <input type="hidden" value="{{$procedimientosp->codProSP}}" name="codProSP">
                            <div class="col-md-12">
                                {!! Field::text('responsable', ['label' => 'RESPONSABLE']) !!}
                                {!! Field::text('nombre', ['label' => 'ACTIVIDAD']) !!}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                    <a href="{{URL::to('macroproceso/listar')}}" class="btn btn-danger btn-outline">CANCELAR</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-lg-12">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-1" data-toggle="tab">ACTIVIDADES
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-10" class="tab-pane active">
                                        <div class="panel-body">
                                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                            <table class="table table-bordered table-actividades" style="margin-top: 10px">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Responsable</th>
                                                    <th>Actividad</th>
                                                    <th width="250px">Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($procedimientosp->actividades as $n => $actividades)
                                                        <tr>
                                                            <td align="middle">{{$n+1}}</td>
                                                            <td>{{$actividades->responsable}}</td>
                                                            <td>{{$actividades->nombre}}</td>
                                                            <td class="tooltip-demo">
                                                                <a href="{!!  route('actividades.mostrar', $actividades->codAct) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="fa fa-eye"></i></a>
                                                                <a href="{!!  route('actividades.editar', $actividades->codAct) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                                                <a href="{!!  route('actividades.eliminar', $actividades->codAct)!!}" class="btn btn-danger btn-outline eliminar-actividad" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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
        $('.eliminar-actividad').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR PROCEDIMIENTO', 'ESTA SEGURO QUE DESEA ELIMINAR ESTE PROCEDIMIENTO? SE BORRARÁ TODO EL CONTENIDO INVOLUCRADO!!',
                function(){
                    window.location.href = data.attr('href');
                },
                function(){
                    alertify.error('Cancelado');
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.table-actividades').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Actividades'},
                    {extend: 'pdf', title: 'Lista de Actividades'},

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