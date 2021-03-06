@section('css-style')
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
        @include('inicio.partials.notificacion')
    <div class="ibox-content">
        <h2> BIENVENIDO <strong>{!! Auth::user()->usuariorol->rol->nombre !!}</strong> : {!! Auth::user()->datos !!}</h2>
    </div>
    @if($procedimiento->count() > 0)
    <hr>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4> <strong> LISTADO DE PROCEDIMIENTOS ASIGNADOS AL {!! Auth::user()->usuariorol->rol->nombre !!}</strong></h4>
        </div>
        <div class="panel-body">
            <h3 align="center">
                 TOTAL: <a class="btn btn-success m-r-sm">{!! $procedimiento->count() !!}</a>
                 ASIGNADOS: <a class="btn btn-danger m-r-sm">{!! $asignado->count() !!}</a> 
                 PENDIENTES: <a class="btn btn-warning m-r-sm">{!! $pendiente->count() !!}</a>
                 APROBADOS: <a class="btn btn-primary m-r-sm">{!! $aprobado->count() !!}</a>
                 RECHAZADOS: <a class="btn btn-danger m-r-sm">{!! $rechazado->count() !!}</a>
                 FINALIZADOS: <a class="btn btn-primary m-r-sm">{!! $finalizado->count() !!}</a>
            </h3><hr>
            <div class="table-responsive">
            <table class="table table-bordered tabla-procedimientos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>JUSTIFICACION</th>
                        <th>DETALLE</th>
                        <th>F. TERMINADO</th>
                        <th>F. RECHAZADO</th>
                        <th>FECHA FIN</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($procedimiento as $row)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! substr($row->justificacion,0,10) !!}</td>
                        <td>{!! substr($row->detalle,0,10) !!}</td>
                        <td>{!! $row->fecha_terminado !!}</td>
                        <td>{!! $row->fecha_rechazado !!}</td>
                        <td>{!! $row->fecha_fin !!}</td>
                        <td>
                            @if($row->codEst == App\Models\Estado::NUEVO)
                            <span class="label label-info">NUEVO</span>
                            @elseif($row->codEst == App\Models\Estado::PENDIENTE)
                            <span class="label label-warning">PENDIENTE</span>
                            @elseif($row->codEst == App\Models\Estado::TERMINADO)
                            <span class="label label-primary">TERMINADO</span>
                            @elseif($row->codEst == App\Models\Estado::APROBADO)
                            <span class="label label-success">APROBADO</span>
                            @elseif($row->codEst == App\Models\Estado::RECHAZADO)
                            <span class="label label-danger">RECHAZADO</span>
                            @endif
                        </td>
                        <td class="tooltip-demo">
                            @if($row->codEst == App\Models\Estado::NUEVO)
                            <a href="{!! url('auditor/desarrollo/crear/'.$row->codProc) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Crear desarrollo de procedimiento"><i class="fa fa-pencil"></i> </a>
                            @elseif($row->codEst == App\Models\Estado::PENDIENTE)
                            <a href="{!! url('auditor/procedimiento/mostrar/'.$row->codProc) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar Desarrollo de procedimiento"><i class="fa fa-eye"></i>  </a>
                            @elseif($row->codEst == App\Models\Estado::TERMINADO)
                                @if(Auth::user()->usuariorol->codUsuRol == $row->codUsuRol)
                                    <span class="label label-primary">TERMINADO</span>
                                @else
                                    <a href="{!! url('jefe-comision/procedimiento/aprobar/'.$row->codProc) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Aprobar"><i class="fa fa-check"></i></a>
                                    <a href="{!! url('jefe-comision/procedimiento/rechazar/'.$row->codProc) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Rechazar"><i class="fa fa-remove"></i></a>
                                @endif
                            @elseif($row->codEst == App\Models\Estado::APROBADO)
                            <span class="label label-success">APROBADO</span>
                            @elseif($row->codEst == App\Models\Estado::RECHAZADO)
                            <span class="label label-danger">RECHAZADO</span>
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
    @endif
    <hr>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4> <strong> LISTADO DE PROCEDIMIENTOS GENERALES</strong></h4>
        </div>
        <div class="panel-body">
            <h3 align="center">
             TOTAL: <a class="btn btn-success m-r-sm">{!! $procedimiento_general->count() !!}</a>
             ASIGNADOS: <a class="btn btn-danger m-r-sm">{!! $asignado_g->count() !!}</a> 
             PENDIENTES: <a class="btn btn-warning m-r-sm">{!! $pendiente_g->count() !!}</a>
             APROBADOS: <a class="btn btn-primary m-r-sm">{!! $aprobado_g->count() !!}</a>
             RECHAZADOS: <a class="btn btn-danger m-r-sm">{!! $rechazado_g->count() !!}</a>
             FINALIZADOS: <a class="btn btn-primary m-r-sm">{!! $finalizado_g->count() !!}</a>
            </h3><hr>
            <div class="table-responsive">
            <table class="table table-bordered tabla-procedimientos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>JUSTIFICACION</th>
                        <th>DETALLE</th>
                        <th>F. TERMINADO</th>
                        <th>F. RECHAZADO</th>
                        <th>FECHA FIN</th>
                        <th>PERSONA</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($procedimiento_general as $row)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{!! substr($row->justificacion,0,10) !!}</td>
                        <td>{!! substr($row->detalle,0,10) !!}</td>
                        <td>{!! $row->fecha_terminado !!}</td>
                        <td>{!! $row->fecha_rechazado !!}</td>
                        <td>{!! $row->fecha_fin !!}</td>
                        <td>{!! $row->nombres !!} {!! $row->paterno !!} {!! $row->materno !!}</td>
                        <td>
                            @if($row->codEst == 1)
                            <span class="label label-info">NUEVO</span>
                            @elseif($row->codEst == 2)
                            <span class="label label-warning">PENDIENTE</span>
                            @elseif($row->codEst == 3)
                            <span class="label label-primary">TERMINADO</span>
                            @elseif($row->codEst == 4)
                            <span class="label label-success">APROBADO</span>
                            @elseif($row->codEst == 5)
                            <span class="label label-danger">RECHAZADO</span>
                            @endif
                        </td>
                        <td class="tooltip-demo">
                            @if($row->codEst == 1)
                            <span class="label label-info">NUEVO</span>
                            @elseif($row->codEst == 2)
                            <span class="label label-warning">PENDIENTE</span>
                            @elseif($row->codEst == 3)
                                @if(Auth::user()->usuariorol->codUsuRol == $row->codUsuRol)
                                    <span class="label label-primary">TERMINADO</span>
                                @else
                                    <a href="{!! url('procedimiento/detalle/'.$row->codProc) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Visualizar procedimiento"><i class="fa fa-eye"></i></a>
                                    <a href="{!! url('jefe-comision/procedimiento/aprobar/'.$row->codProc) !!}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Aprobar"><i class="fa fa-check"></i></a>
                                    <a href="{!! url('jefe-comision/procedimiento/rechazar/'.$row->codProc) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Rechazar"><i class="fa fa-remove"></i></a>
                                @endif
                            @elseif($row->codEst == 4)
                            <span class="label label-success">APROBADO</span>
                            @elseif($row->codEst == 5)
                            <span class="label label-danger">RECHAZADO</span>
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

@section('js-script')
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
    <script>
        $(document).ready(function(){
            $('.tabla-procedimientos').DataTable({
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