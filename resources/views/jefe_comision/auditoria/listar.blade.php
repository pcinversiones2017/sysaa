@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
    {!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@stop
@section('content')
        
    @include('partials.alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Auditorias </h5>
                </div>
                <div class="ibox-content">


                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                    <table class="table table-bordered table-auditorias">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Datos</th>
                            <th>Email</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($auditorias as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->nombrePlanF !!}</td>
                                <td>{!! $row->tipoServicioCP !!}</td>
                                <td>
                                    <a href="{!! url('auditoria/aprobar/'.$row->codPlanF) !!}" class="btn btn-success btn-sm"> Aprobar </a>
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
        $(document).ready(function(){
            $('.table-auditorias').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista Auditorias'},
                    {extend: 'pdf', title: 'Lista Auditorias'},

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