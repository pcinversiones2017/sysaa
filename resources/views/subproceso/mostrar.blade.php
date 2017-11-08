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
                            GENERAR PROCEDIMIENTO
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <ol class="breadcrumb">
                                        <li>
                                            <a href="{!! route('macroproceso.listar') !!}">MACROPROCESO</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('macroproceso/mostrar')}}/{{$subproceso->procesoMA->codMacroP}}">PROCESO</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('procesoma/mostrar')}}/{{$subproceso->codProMA}}">SUBPROCESO</a>
                                        </li>
                                        <li class="active">
                                            <strong>CREAR PROCEDIMIENTO</strong>
                                        </li>
                                    </ol>
                                </div>
                                {!! Field::text('MACROPROCESO', $subproceso->procesoMA->macroProceso->nombre,['readonly' => 'true']) !!}
                                {!! Field::text('PROCESO', $subproceso->procesoMA->nombre,['readonly' => 'true']) !!}
                                {!! Field::text('SUBPROCESO', $subproceso->nombre,['readonly' => 'true']) !!}
                            </div>
                            <div class="m-b-md">
                                {!! Form::open(['method' => 'POST', 'route' => 'procedimientosp.guardar']) !!}
                                <input type="hidden" value="{{$subproceso->codSubPro}}" name="codSubPro">
                                <div class="col-md-12">
                                    {!! Field::text('nombre', ['label' => 'PROCEDIMIENTO']) !!}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-outline" value=""><i class="fa fa-save"></i> REGISTRAR</button>
                                        <a href="{{URL::to('macroproceso/listar')}}" class="btn btn-danger btn-outline">CANCELAR</a>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            PROCEDIMIENTOS
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-procedimientos" style="margin-top: 10px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th width="250px">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subproceso->procedimientoSP as $n => $procedimientosp)
                                        <tr>
                                            <td align="middle">{{$n+1}}</td>
                                            <td>{{$procedimientosp->nombre}}</td>
                                            <td>
                                                <a href="{!!  route('procedimientosp.mostrar', $procedimientosp->codProSP) !!}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                                <a href="{!!  route('procedimientosp.editar', $procedimientosp->codProSP) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
                                                <a href="{!!  route('procedimientosp.eliminar', $procedimientosp->codProSP)!!}" class="btn btn-danger btn-outline eliminar-procedimiento"><i class="fa fa-trash"></i></a>
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

@endsection
@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}


    <script>
        $('.eliminar-procedimiento').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Procedimiento', 'Esta seguro que desea eliminar este procedimiento, se borraran todo el contenido involucrado!!',
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
            $('.table-procedimientos').DataTable({
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