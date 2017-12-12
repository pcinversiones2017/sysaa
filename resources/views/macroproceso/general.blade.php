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
                            LISTA DE GENERAL DE MACROPROCESOS
                        </div>
                        <div class="panel-body">
                            <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                            <div class="table-responsive">
                            <table class="table table-bordered table-macroprocesos">
                                <thead>
                                <tr>
                                    <th>MACROPROCESO</th>
                                    <th>PROCESO</th>
                                    <th>PROCESO RIESGO</th>
                                    <th>PROCESO PONDERACION</th>
                                    <th>SUBPROCESO</th>
                                    <th>SUBPROCESO RIESGO</th>
                                    <th>SUBPROCESO PONDERACION</th>
                                    <th>PROCEDIMIENTO</th>
                                    <th>PROCEDIMIENTO RIESGO</th>
                                    <th>PROCEDIMIENTO PONDERACION</th>
                                    <th>ACTIVIDAD REPONSABLE</th>
                                    <th>ACTIVIDAD NOMBRE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($general as $row)
                                    <tr>
                                        <td>{{$row->macronom}}</td>
                                        <td>{{$row->pronom}}</td>
                                        <td>{{$row->prories}}</td>
                                        <td>{{$row->propon}}</td>
                                        <td>{{$row->subnom}}</td>
                                        <td>{{$row->subries}}</td>
                                        <td>{{$row->subpon}}</td>
                                        <td>{{$row->procenom}}</td>
                                        <td>{{$row->proceries}}</td>
                                        <td>{{$row->procepon}}</td>
                                        <td>{{$row->actres}}</td>
                                        <td>{{$row->actnom}}</td>
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
        $(document).ready(function(){
            $('.table-macroprocesos').DataTable({
                "ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista General de Macroproceso'},
                    {extend: 'pdf', title: 'Lista General de Macroproceso'},

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
