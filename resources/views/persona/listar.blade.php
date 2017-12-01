@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE DATOS PERSONALES
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-3">
                    <a type="button" href="{!! route('persona.crear') !!}" class="btn btn-outline btn-success"><i class="fa fa-pencil"></i> CREAR PERSONA</a>
                    <p>
                </div>
            </div>

            <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
            <table class="table table-bordered table-personas">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRES</th>
                    <th>AP. PATERNO</th>
                    <th>AP. MATERNO</th>
                    <th>EMAIL</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($personas as $persona)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $persona->nombres !!}</td>
                        <td>{!! $persona->paterno !!}</td>
                        <td>{!! $persona->materno !!}</td>
                        <td>{!! $persona->email !!}</td>
                        <td style="text-align: center">
                            <a href="{!! url('persona/editar/' . $persona->codPer) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i>  </a>
                            <a href="{!! url('persona/eliminar/' . $persona->codPer) !!}" class="btn btn-danger btn-outline eliminar-persona"><i class="fa fa-trash"></i>  </a>
                        </td>
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
        $('.eliminar-persona').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR PERSONA', '¿ESTA SEGURO QUE DESEA ELIMINAR ESTA PERSONA?',
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
