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

                <div class="ibox-title">
                    <h5>GENERAR PROCESOS</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
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
                                        <a href="#tab-1" data-toggle="tab">SUBPROCESO
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-10" class="tab-pane active">
                                        <div class="panel-body">
                                            <table class="table table-bordered table-subprocesos" style="margin-top: 10px">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th width="250px">Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($procesoma->subProceso as $n => $subproceso)
                                                        <tr>
                                                            <td align="middle">{{$n+1}}</td>
                                                            <td>{{$subproceso->nombre}}</td>
                                                            <td>
                                                                <a href="{!!  route('subproceso.mostrar', $subproceso->codSubPro) !!}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i></a>
                                                                <a href="{!!  route('subproceso.editar', $subproceso->codSubPro) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i></a>
                                                                <a href="{!!  route('subproceso.eliminar', $subproceso->codSubPro)!!}" class="btn btn-danger btn-outline eliminar-subproceso"><i class="fa fa-trash"></i></a>
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
        $('.eliminar-subproceso').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Subproceso', 'Esta seguro que desea eliminar este subproceso, se borraran todo el contenido involucrado!!',
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