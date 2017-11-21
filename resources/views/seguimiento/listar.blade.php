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
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Lista de Seguimientos </h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-sm-3">
                            <a type="button" href="{!! url()->previous() !!}" class="btn btn-outline btn-danger"> ATRAS</a>
                            <a type="button" href="{!! url('seguimiento/crear/'.$codProc.'/'.$codDes.'/'.$codObs) !!}" class="btn btn-outline btn-primary"> REGISTRAR</a>
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
                                    <a href="{!! url('seguimiento/editar/'.$codProc.'/'.$codDes.'/'.$codObs.'/'.$row->codSeg) !!}" class="btn btn-primary btn-outline"><i class="fa fa-pencil"></i>  </a>
                                    <a href="{!! url('seguimiento/eliminar/'.$row->codSeg) !!}" class="btn btn-danger btn-outline"><i class="fa fa-trash"></i>  </a>
                                    <a href="{!! url('seguimiento/archivo/crear/'.$codProc.'/'.$codDes.'/'.$codObs.'/'.$row->codSeg) !!}" class="btn btn-warning btn-outline"><i class="fa fa-upload"></i>  </a>
                                    <a href="{!! url('seguimiento/archivo/listar/'.$codProc.'/'.$codDes.'/'.$codObs.'/'.$row->codSeg) !!}" class="btn btn-info btn-outline"><i class="fa fa-paperclip"></i>  </a>
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