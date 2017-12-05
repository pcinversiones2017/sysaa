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
                                GENERAR SUBPROCESO
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <ol class="breadcrumb">
                                            <li>
                                                <a href="{!! route('macroproceso.listar') !!}">MACROPROCESO</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('macroproceso/mostrar')}}/{{$procesoma->codMacroP}}">PROCESO</a>
                                            </li>
                                            <li class="active">
                                                <strong>CREAR SUBPROCESO</strong>
                                            </li>
                                        </ol>
                                    </div>
                                    {!! Field::text('MACROPROCESO', $procesoma->macroProceso->nombre,['readonly' => 'true']) !!}
                                    {!! Field::text('PROCESO', $procesoma->nombre,['readonly' => 'true']) !!}
                                </div>
                                <div class="m-b-md">
                                    {!! Form::open(['method' => 'POST', 'route' => 'subproceso.guardar']) !!}
                                    <input type="hidden" value="{{$procesoma->codProMA}}" name="codProMA">
                                    <div class="col-md-12">
                                        {!! Field::text('nombre', ['label' => 'SUBPROCESO']) !!}
                                        {!! Field::textarea('riesgo', ['label' => 'RIESGO']) !!}
                                        <div class="form-group">
                                            <label>PONDERACION</label>
                                        {!! Form::select('ponderacion', ['ALTO' => 'ALTO', 'MEDIO' => 'MEDIO', 'BAJO' => 'BAJO'], null, ['placeholder' => 'SELECCIONAR PONDERACION', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                                            <a href="{{URL::to('macroproceso/listar')}}" class="btn btn-danger btn-outline">ATRAS</a>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                SUBPROCESOS
                            </div>
                            <div class="panel-body">
                                    <div class="col-lg-12">
                                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                        <table class="table table-bordered table-subprocesos" style="margin-top: 10px">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Riesgo</th>
                                                <th>Ponderado</th>
                                                <th width="250px">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($procesoma->subProceso as $n => $subproceso)
                                                <tr>
                                                    <td align="middle">{{$n+1}}</td>
                                                    <td>{{$subproceso->nombre}}</td>
                                                    <td>{{$subproceso->riesgo}}</td>
                                                    <td>{{$subproceso->ponderacion}}</td>
                                                    <td class="tooltip-demo">
                                                        <a href="{!!  route('subproceso.mostrar', $subproceso->codSubPro) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="fa fa-eye"></i></a>
                                                        <a href="{!!  route('subproceso.editar', $subproceso->codSubPro) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                                        <a href="{!!  route('subproceso.eliminar', $subproceso->codSubPro)!!}" class="btn btn-danger btn-outline eliminar-subproceso" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
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
        $('.eliminar-subproceso').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR SUBPROCESO', 'ESTA SEGURO QUE DESEA ELIMINAR ESTE SUBPROCESO, SE BORRARÁ TODO EL CONTENIDO INVOLUCRADO!!',
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
            $('.table-subprocesos').DataTable({
                "ordering": false,
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