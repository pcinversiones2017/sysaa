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
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            GENERAR ACTIVIDAD
                        </div>
                        <div class="panel-body">
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
                                    {!! Field::textarea('nombre', ['label' => 'ACTIVIDAD', 'rows' => 3]) !!}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-outline" value=""><i class="fa fa-save"></i> REGISTRAR</button>
                                        <a href="{{URL::to('macroproceso/listar')}}" class="btn btn-danger btn-outline">ATRAS</a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            ACTIVIDADES
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                <table class="table table-actividades" style="margin-top: 10px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Responsable</th>
                                        <th>Actividad</th>
                                        <th width="250px">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($procedimientosp->actividades as $n => $actividad)
                                        <tr>
                                            <td align="middle">{{$n+1}}</td>
                                            <td>{{$actividad->responsable}}</td>
                                            <td>{{$actividad->nombre}}</td>
                                            <td class="tooltip-demo">
                                                <a href="{!!  route('actividad.editar', $actividad->codAct) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                                <a href="{!!  route('actividad.eliminar', $actividad->codAct)!!}" class="btn btn-danger btn-outline eliminar-actividad" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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

@endsection
@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}


    <script>
        $('.eliminar-actividad').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR ACTIVIDAD', '¿ESTA SEGURO QUE DESEA ELIMINAR ESTA ACTIVIDAD?',
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
                "ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Procedimiento'},
                    {extend: 'pdf', title: 'Lista de Procedimiento'},

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