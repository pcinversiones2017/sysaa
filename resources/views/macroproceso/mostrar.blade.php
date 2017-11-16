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
                            CREAR PROCESO
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <ol class="breadcrumb">
                                            <li>
                                                <a href="{!! route('macroproceso.listar') !!}">MACROPROCESO</a>
                                            </li>
                                            <li class="active">
                                                <strong>CREAR PROCESO</strong>
                                            </li>
                                        </ol>
                                    </div>
                                    {!! Field::text('MACROPROCESO', $macroproceso->nombre,['readonly' => 'true']) !!}
                                </div>
                                <div class="m-b-md">
                                    {!! Form::open(['method' => 'POST', 'route' => 'procesoma.guardar']) !!}
                                    <input type="hidden" value="{{$macroproceso->codMacroP}}" name="codMacroP">
                                    <div class="col-md-12">
                                        {!! Field::text('nombre', ['label' => 'PROCESO']) !!}
                                        {!! Field::textarea('riesgo', ['label' => 'RIESGO']) !!}
                                        <div class="form-group">
                                            <label>PONDERACION</label>
                                        {!! Form::select('ponderacion', ['ALTO' => 'ALTO', 'MEDIO' => 'MEDIO', 'BAJO' => 'BAJO'], null, ['placeholder' => 'SELECCIONAR PONDERACION', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-outline" value="REGISTRAR">
                                            <a href="{{URL::to('macroproceso/listar')}}" class="btn btn-danger btn-outline">ATRAS</a>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div></div>
                        </div>

                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            PROCESOS
                        </div>
                        <div class="panel-body">
                            <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                            <table class="table table-bordered table-procesos" style="margin-top: 10px">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Riesgo</th>
                                    <th>Ponderación</th>
                                    <th width="250px">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($macroproceso->procesoMA as $n => $procesoma)
                                    <tr>
                                        <td align="middle">{{$n+1}}</td>
                                        <td>{{$procesoma->nombre}}</td>
                                        <td>{{$procesoma->riesgo}}</td>
                                        <td>{{$procesoma->ponderacion}}</td>
                                        <td>
                                            <a href="{!!  route('procesoma.mostrar', $procesoma->codProMA) !!}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                            <a href="{!!  route('procesoma.editar', $procesoma->codProMA) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
                                            <a href="{!!  url('procesoma/eliminar/'.$macroproceso->codMacroP.'/'.$procesoma->codProMA)!!}" class="btn btn-danger btn-outline eliminar-proceso"><i class="fa fa-trash"></i></a>

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

@endsection

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}


    <script>
        $('.eliminar-proceso').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Procesoma', 'Esta seguro que desea eliminar este proceso, se borraran todo el contenido involucrado!!',
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
            $('.table-procesos').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Macroprocesos'},
                    {extend: 'pdf', title: 'Lista de Macroprocesos'},

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