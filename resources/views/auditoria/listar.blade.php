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
                            LISTADO DE AUDITORIAS PROGRAMADAS
                        </div>
                        <div class="panel-body">
                            <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                            <table class="table table-bordered table-auditoria">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>CODIGO DEL SERVICIO DE CONTROL</th>
                                    <th>ENTIDAD AUDITADA</th>
                                    <th>PLAN ANUAL</th>
                                    <th>TIPO</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                @foreach($auditorias as $auditoria)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$auditoria->nombrePlanF}}</td>
                                        <td>{{$auditoria->codigoServicioCP}}</td>
                                        <td>{{$auditoria->entidadAuditada}}</td>
                                        <td>{{$auditoria->planAnual->nombrePlan}}</td>
                                        <td>{{$auditoria->tipoActividad}}</td>
                                        <td><label class="label label-{{$auditoria->estado->label}}">{{$auditoria->estado->nombre}}</label></td>
                                        <td width="15%" class="tooltip-demo">
                                            <a href="{{URL::to('auditoria/mostrar')}}/{{$auditoria->codPlanF}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Ver"><i class="fa fa-eye"></i></a>
                                            <a href="{{URL::to('auditoria/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="{!! route('auditoria.eliminar', $auditoria->codPlanF) !!}" class="btn btn-danger btn-outline eliminar-auditoria" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
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
        $('.eliminar-auditoria').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Auditoria', 'Esta seguro que desea eliminar este auditoria, se borraran todo el contenido involucrado!!',
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
            $('.table-auditoria').DataTable({
                "ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {
                        extend: 'excel',
                        title: 'Lista Auditorias',
                        exportOptions : {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                        title: 'Lista Auditorias',
                        exportOptions : {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },

                    {
                        extend: 'print',
                        orientation: 'landscape',
                        exportOptions : {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
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