@extends('layout.admin')

@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop

@section('content')
    
    @include('partials.alert')

    <div class="panel panel-success">
        <div class="panel-heading">
            LISTA DE SEGUIMIENTOS
        </div>
        <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{!! url()->previous() !!}" class="btn btn-outline btn-danger"> ATRAS</a>
                            <a type="button" href="{!! url('seguimiento/crear/'.$codObs) !!}" class="btn btn-outline btn-success"> REGISTRAR</a>
                            <p>
                            
                        </div>
                    </div>
                    <h4 align="right"><strong class="label label-success">GENERAR REPORTES</strong></h4>
                    <table class="table table-bordered table-responsive table-procedimientos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ACCIONES REALIZADOS POR EL AUDITADO</th>
                            <th>EVALUACION DEL AUDITOR</th>
                            <th>ESTADO</th>                            
                            <th>ACCION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1 ?>
                        @foreach($seguimientos as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{!! $row->acciones !!}</td>
                                <td>{!! $row->evaluacion !!}</td>
                                <td>{!! $row->estado !!}</td>
                                <td>
                                    <a href="{!! url('seguimiento/editar/'.$codObs.'/'.$row->codSeg) !!}" class="btn btn-primary btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i>  </a>
                                    <a href="{!! url('seguimiento/eliminar/'.$row->codSeg) !!}" class="btn btn-danger btn-outline" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('seguimiento/archivo/crear/'.$codObs.'/'.$row->codSeg) !!}" class="btn btn-warning btn-outline" data-toggle="tooltip" data-placement="bottom" title="Adjuntar Documentos"><i class="fa fa-upload"></i>  </a>
                                    <a href="{!! url('seguimiento/archivo/listar/'.$codObs.'/'.$row->codSeg) !!}" class="btn btn-info btn-outline" data-toggle="tooltip" data-placement="bottom" title="Listar documentos adjuntados"><i class="fa fa-paperclip"></i>  </a>
                                </td>
                            </tr>
                        <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <a href="{!! url('Manual_de_Encuesta_ONLINE-SurveyMonkey.pdf') !!}" class="btn btn-primary" target="_lblank">MANUAL DE ENCUESTA ONLINE</a>
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
            alertify.confirm('ELIMINAR PROCEDIMIENTO', '¿ESTA SEGURO DE DESEA ELIMINAR ESTE PROCEDIMIENTO?, SE BORRARÁ TODO EL CONTENIDO INVOLUCRADO!!',
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
                "ordering": false,
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 10,
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