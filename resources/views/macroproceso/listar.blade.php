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
                            LISTA DE MACROPROCESOS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a type="button" href="{{URL::to('macroproceso/crear')}}" class="btn btn-outline btn-success">
                                        <i class="fa fa-pencil"></i> CREAR MACROPROCESO</a><p>
                                </div>
                            </div>
                            <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                            <table class="table table-bordered table-macroprocesos">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Fecha creacion</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($macroprocesos as $n =>$macroproceso)
                                    <tr>
                                        <td align="middle">{{$n+1}}</td>
                                        <td>{{$macroproceso->nombre}}</td>
                                        <td>{{$macroproceso->fecha_creado}}</td>
                                        <td width="15%" style="text-align: center">
                                            <a href="{{URL::to('macroproceso/mostrar')}}/{{$macroproceso->codMacroP}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i>  </a>
                                            <a href="{{URL::to('macroproceso/editar')}}/{{$macroproceso->codMacroP}}" class="btn btn-primary btn-outline">
                                                <i class="fa fa-edit"></i>  </a>
                                            <a href="{{URL::to('macroproceso/eliminar')}}/{{$macroproceso->codMacroP}}" class="btn btn-danger btn-outline eliminar-macroproceso">
                                                <i class="fa fa-trash"></i>  </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
@endsection

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}


    <script>
        $('.eliminar-macroproceso').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Macroproceso', 'Esta seguro que desea eliminar este macroproceso, se borraran todo el contenido involucrado!!',
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
            $('.table-macroprocesos').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 10,
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
