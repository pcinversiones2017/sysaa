@extends('layout.admin')

@section('css-style')
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop

@section('content')

    @include('partials.alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                <h3>LISTADO DE PROCEDIMIENTOS</h3>
                <hr>
                <h3>
                 TOTAL: <a class="btn btn-success m-r-sm">{!! $procedimiento->count() !!}</a>
                 ASIGNADOS: <a class="btn btn-danger m-r-sm">{!! $asignado->count() !!}</a> 
                 PENDIENTES: <a class="btn btn-warning m-r-sm">{!! $pendiente->count() !!}</a>
                 APROBADOS: <a class="btn btn-primary m-r-sm">{!! $aprobado->count() !!}</a>
                 RECHAZADOS: <a class="btn btn-danger m-r-sm">{!! $rechazado->count() !!}</a>
                 FINALIZADOS: <a class="btn btn-primary m-r-sm">{!! $finalizado->count() !!}</a>
                </h3>
                </div>
                <div class="ibox-content">

                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                    <table class="table table-bordered table-procedimientos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Justificacion</th>
                            <th>detalle</th>
                            <th>fecha fin</th>
                            <th>ACCION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($procedimiento as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->justificacion !!}</td>
                                <td>{!! $row->detalle !!}</td>
                                <td>{!! $row->fecha_fin !!}</td>
                                    </td>
                                <td>
                                    @if($row->codEst == 2)
                                    <a href="{!! url('auditor/procedimiento/mostrar/'.$row->codProc) !!}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i>  </a>
                                    @elseif($row->codEst == 1)
                                    <a href="{!! url('auditor/desarrollo/crear/'.$row->codProc) !!}" class="btn btn-success btn-outline"><i class="fa fa-pencil"></i>  </a>
                                    @elseif($row->codEst == 4)
                                    <a href="" class="btn btn-success btn-outline">APROBADO</a>
                                    @elseif($row->codEst == 3)
                                    <a href="" class="btn btn-danger btn-outline">FINALIZADO</a>
                                    @elseif($row->codEst == 5)
                                    <a href="" class="btn btn-danger btn-outline">RECHAZADO</a>
                                    <a href="{!! url('auditor/procedimiento/mostrar/'.$row->codProc) !!}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i>  </a>
                                    @else
                                    <a href="" class="btn btn-primary btn-outline">CONCLUIDO</a>
                                    @endif
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
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
    <script>
        $(document).ready(function(){
            $('.table-procedimientos').DataTable({
                "ordering": false,
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