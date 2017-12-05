@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE INFORMES {{ $terceros ?? '' }}
        </div>
        <div class="panel-body">

            <table class="table table-bordered table-informes">
                <thead>
                <tr>
                    <th>#</th>
                    <th>AUDITORIA</th>
                    <th>CODIGO SERVICIO CP</th>
                    <th>FECHA DE INFORME</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($auditorias as $auditoria)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $auditoria->nombrePlanF !!}</td>
                        <td>{!! $auditoria->codigoServicioCP !!}</td>
                        @if(empty($auditoria->informe->elaborado))
                        <td></td>
                        @else
                        <td>{!! $auditoria->informe->elaborado !!}</td>
                        @endif
                        @if(empty($auditoria->informe->informe))
                        <td style="text-align: center" class="tooltip-demo">
                            <a href="{!! url('informe/crear/' . $auditoria->codPlanF) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Crear Informe"><i class="fa fa-pencil"></i>  </a>
                        </td>
                        @else
                        <td style="text-align: center" class="tooltip-demo">
                            <a href="{!! url('informe/editar/' . $auditoria->codPlanF) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i>  </a>
                            <a href="{!! url('informe/archivo/crear/'. $auditoria->informe->codInf) !!}" class="btn btn-warning btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar Documentos"><i class="fa fa-upload"></i>  </a>
                            <a href="{!! url('informe/archivo/listar/'. $auditoria->informe->codInf) !!}" class="btn btn-info btn-outline" data-toggle="tooltip" data-placement="bottom" title="Visualizar documentos adjuntados"><i class="fa fa-paperclip"></i>  </a>
                            <a target="_blank" href="{!! url('reporte/informe-final/' . $auditoria->codPlanF)!!}" class="btn btn-info btn-outline" data-toggle="tooltip" data-placement="bottom" title="Descargar"><i class="fa fa-download"> </i></a>
                        </td>
                        @endif
                    </tr>
                    <?php $i++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}

    <script>
        $(document).ready(function(){
            $('.table-informes').DataTable({
                "ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {
                        extend: 'excel',
                        title: 'Lista de personas',
                        exportOptions : {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        title: 'Lista de personas',
                        exportOptions : {
                            columns: [0, 1, 2, 3, 4]
                        },
//                        customize: function (doc){
//                            $(doc.document).find('table')
//                                .addClass('compact')
//                                .css('font-size', 'inherit');
//                        },
                        customize: function (doc) {
                            doc.content[1].table.widths = [ '5%', '20%', '20%', '20%', '35%']
                        }
                    },

                    {extend: 'print',
                        title: 'Lista de Personas',

                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions : {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ]

            });

        });

    </script>

@stop
