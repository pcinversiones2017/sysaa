@extends('layout.admin')

@section('content')
    @include('partials.alert')

    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE OBSERVACIONES
        </div>
        <div class="panel-body">

            <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                    <table class="table table-bordered table-personas">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>TITULO</th>
                            <th>DESCRIPCION</th>
                            <th>RECOMENDACION</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($observaciones as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->titulo !!}</td>
                                <td>{!! $row->descripcion !!}</td>
                                <td>{!! $row->recomendacion !!}</td>
                                <td>
                                    <a href="{!! url('seguimiento/listar/'.$row->codObs) !!}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i>  </a>
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

@stop

@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}

    <script>
        $('.eliminar-persona').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Persona', '¿Esta seguro que desea eliminar esta persona?',
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
            $('.table-personas').DataTable({
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
