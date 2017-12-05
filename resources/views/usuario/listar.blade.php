@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
@section('content')
    @include('partials.alert')

    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE USUARIOS
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>USUARIO</th>
                    <th>DATOS</th>
                    <th>AUDITORIA</th>
                    <th>ROL</th>
                    <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($usuarios as $row)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! $row->username !!}</td>
                        <td>{!! $row->datos !!}</td>
                        <td>{!! $row->usuariorol->auditoria->nombrePlanF ?? '' !!}</td>
                        <td>{!! $row->usuariorol->rol->nombre !!}</td>
                        <td style="text-align: center" class="tooltip-demo">
                            <a href="{!! url('usuario/usuario-editar/'.$row->codUsu) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i>  </a>
                            <a href="{!! url('historial/historial/'.$row->codUsu) !!}" class="btn btn-success btn-outline"><i class="fa fa-history" data-toggle="tooltip" data-placement="bottom" title="Ver historial de navegacion"></i>  </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
    <script>
        $(document).ready(function(){
            $('.table-usuarios').DataTable({
                "ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista de Usuarios'},
                    {extend: 'pdf', title: 'Lista de Usuarios '},

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