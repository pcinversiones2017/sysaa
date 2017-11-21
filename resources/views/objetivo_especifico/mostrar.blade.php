@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                   OBJETIVO ESPECIFICO
                                </div>
                                <div class="panel-body">
                                    <p>{{$objetivoEspecifico->nombre}}</p>
                                    <br>
                                    <h4>Materias a examinar </h4>
                                    <p>{{$objetivoEspecifico->materia}}</p>
                                </div>
                            </div>
                            <a href="{!! url('procedimiento/procedimiento-crear/' . $codPlanF . '/' . $codObjEsp) !!}" class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> CREAR PROCEDIMIENTO</a>
                            <a href="{!! url('auditoria/mostrar/'.$codPlanF) !!}" class="btn btn-danger btn-outline">ATRAS</a>
                        </div>
                    </div>
                </div>
                <br>
                @include('partials.alert')
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    PROCEDIMIENTOS
                                </div>
                                <div class="panel-body">
                                    <div class="m-b-md">
                                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                                        <table class="table table-bordered table-responsive table-procedimientos">
                                            <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>DATOS</th>
                                                <th>JUSTIFICACION</th>
                                                <th>DETALLE</th>
                                                <th>FECHA FIN</th>
                                                <th>ACCION</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $i=1 ?>
                                            @foreach($objetivoEspecifico->procedimientos as $row)
                                                <tr>
                                                    <td>{!! $i !!}</td>
                                                    <td width="10%">{!! $row->codusurol->usuario->datos !!}</td>
                                                    <td>{!! $row->justificacion !!}</td>
                                                    <td>{!! $row->detalle !!}</td>
                                                    <td width="10%">{!! date('d-m-Y', strtotime($row->fecha_fin)) !!}</td>
                                                    <td width="15%" style="text-align: center">
                                                        <a href="{!! url('procedimiento/procedimiento-eliminar/' . $row->codProc) !!}" class="btn btn-danger btn-outline eliminar-procedimiento"><i class="fa fa-trash"></i>  </a>
                                                        <a href="{!! url('procedimiento/procedimiento-editar/' . $codPlanF . '/' . $objetivoEspecifico->codObjEsp.'/'.$row->codProc) !!}" class="btn btn-primary btn-outline"><i class="fa fa-edit"></i>  </a>
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
                    </div>
                </div>
            </div>
        </div>
   	</div>

@stop

@section('js-script')
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}



    <script>
        $('.eliminar-procedimiento').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('Eliminar Procedimiento', 'Esta seguro que desea eliminar este procedimiento, se borraran todo el contenido involucrado!!',
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
            $('.table-procedimientos').DataTable({
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