@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop

@section('js-script')
    @if(session('animate'))
        <script type="application/javascript">
            $("html, body").animate({
                scrollTop: $("{!! session('animate') !!}").offset().top - 100
            }, 2000);

        </script>
    @endif
    {!! Html::script('js/plugins/alertifyjs/alertify.min.js') !!}
    {!! Html::script('js/plugins/dataTables/datatables.min.js') !!}
    <script>
        $('.eliminar-objetivo-especifico').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR OBJETIVO ESPECÍFICO', '¿ESTA SEGURO QUE DESEA ELIMINAR ESTE OBJETIVO ESPECÍFICO?, SE BORRARÁ TODO EL CONTENIDO INVOLUCRADO!!',
                function(){
                    window.location.href = data.attr('href');
                },
                function(){
                    alertify.error('Cancelado');
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });
    </script>
    <script>
        $('.eliminar-normativa').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR NORMATIVA', '¿ESTA SEGURO QUE DESEA ELIMINAR ESTA NORMATIVA?',
                function(){
                    window.location.href = data.attr('href');
                },
                function(){
                    alertify.error('Cancelado');
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });
    </script>
    <script>
        $('#culminar-planificacion').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('CULMINAR PLANIFICACIÓN', '¿ESTA SEGURO QUE DESEA CULMINAR ESTA PLANIFICACIÓN? ' +
                'LUEGO DE ELLO PASARÁ A ESTADO PENDIENTE DE APROBACIÓN POR EL JEFE DE COMISIÓN',
                function(){
                    window.location.href = data.attr('href');
                },
                function(){
                    alertify.error('Cancelado');
                }).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });
    </script>

    <script>
        $('.eliminar-asignacion').on('click', function (e) {
            e.preventDefault();
            var data = $(this);
            alertify.confirm('ELIMINAR ASIGNACIÓN', '¿ESTA SEGURO QUE DESEA ELIMINAR ESTA ASIGNACIÓN?',
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
            $('.table-objetivo-especifico').DataTable({
                language: {
                    url : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [

                    {extend: 'excel', title: 'Lista Objetivos Especificos'},
                    {extend: 'pdf', title: 'Lista Objetivos Especificos'},

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



@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('partials.alert')
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-title">
                        <h2 style="text-align: center">ETAPA DE PLANIFICACIÓN</h2>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                {{--<div class="col-lg-12">--}}
                                    {{--<a href="{{URL::to('auditoria/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i> EDITAR</a>--}}
                                    {{--<h2></h2>--}}
                                {{--</div>--}}
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        I. DATOS DE LA AUDITORIA

                                            <a class="pull-right" style="color: white" href="{!! route('auditoria.editar', $auditoria->codPlanF) !!}"><i class="fa fa-edit"></i> EDITAR</a>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-lg-5">
                                            <div class="form-horizontal">

                                                <div class="form-group"><label class="col-lg-6 control-label">Nombre Auditoria:</label>

                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px">{{$auditoria->nombrePlanF}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Estado:</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px"><span class="label label-{{$auditoria->estado->label}}">{{$auditoria->estado->nombre}}</span></h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Creado por:</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px"></h5>
                                                </div>
                                                <div class="form-group"><label class="col-lg-6 control-label">Código del servicio de control posterior:</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px">{{$auditoria->codigoServicioCP}}</h5>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-lg-5" id="cluster_info">

                                            <div class="form-horizontal">
                                                <div class="form-group"><label class="col-lg-6 control-label">Tipo de servicio de control posterior:</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px">{{$auditoria->tipoServicioCP}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Organo de control institucional:</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px">{{$auditoria->organoCI}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Fecha de Creación</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px">{{$auditoria->fecha_creado}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Entidad Auditada:</label>
                                                    <h5 class="text-left col-lg-6" style="padding-top: 5px">{{$auditoria->entidadAuditada}}</h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-12">--}}
                                {{--<dl class="dl-horizontal">--}}
                                    {{--<dt>Completado:</dt>--}}
                                    {{--<dd>--}}
                                        {{--<div class="progress progress-striped active m-b-sm">--}}
                                            {{--<div style="width: 60%;" class="progress-bar"></div>--}}
                                        {{--</div>--}}
                                        {{--<small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>--}}
                                    {{--</dd>--}}
                                {{--</dl>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        II. ORIGEN
                                    </div>
                                    <div class="panel-body">
                                        <p>{{$auditoria->origen}}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12" id="objetivo-general">
                                <div class="panel panel-success">

                                    <div class="panel-heading">
                                        III. OBJETIVO GENERAL
                                    </div>
                                    <div class="panel-body">
                                        @if(isset($auditoria->objetivoGeneral->nombre))
                                            <p>{{$auditoria->objetivoGeneral->nombre}}</p>
                                            @include('objetivo_general.partials.listar')
                                        @else
                                            <div class="alert alert-danger  alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                Debe registrar su objetivo general para poder crear sus procedimientos.
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12" id="asignacion">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        IV. COMISIÓN AUDITORA
                                    </div>
                                    <div class="panel-body">
                                        @include('asignacion.partials.listar')
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12" id="objetivo-especifico">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        V. OBJETIVO ESPECÍFICO
                                    </div>
                                    <div class="panel-body">
                                        @if(isset($auditoria->objetivoGeneral->nombre))
                                            @include('objetivo_especifico.partials.listar')
                                        @else
                                            <div class="alert alert-danger  alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                Debe registrar su objetivo general para poder crear los objetivos especificos.
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        VI. PERIODO A EXAMINAR
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>DESDE</td>
                                                    <td>{{ isset($auditoria->periodoIniPlanF) ? date('d-m-Y', strtotime($auditoria->periodoIniPlanF)) : ''}}</td>
                                                    <td>HASTA</td>
                                                    <td>{{ isset($auditoria->periodoFinPlanF) ? date('d-m-Y', strtotime($auditoria->periodoFinPlanF)) : ''}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12"  id="normativa">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        VII. NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR
                                    </div>
                                    <div class="panel-body">
                                        @include('norma_auditoria.partials.listar-aplica')
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        VII. NORMATIVA QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO
                                    </div>
                                    <div class="panel-body">
                                        @include('norma_auditoria.partials.listar')
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12" id="cronograma">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        VIII. CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS
                                    </div>
                                    <div class="panel-body">
                                        @include('cronograma.partials.mostrar')
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="ibox-footer">
                            <div class="form-group" style="margin-left: 5px">
                                @if($auditoria->estado->codEstAud == \App\Models\EstadoAuditoria::PENDIENTE )
                                    <a id="culminar-planificacion" href="{!! route('auditoria.culminar', $auditoria->codPlanF) !!}" class="btn btn-success">CULMINAR PLANIFICACIÓN</a>
                                @elseif($auditoria->estado->codEstAud == \App\Models\EstadoAuditoria::EN_PROCESO)
                                    <a id="finalizar-planificacion" href="{!! route('auditoria.finalizar', $auditoria->codPlanF) !!}" class="btn btn-success">FINALIZAR PLANIFICACIÓN</a>
                                    <a target="_blank" href="{!! url('reporte/planificacion', $auditoria->codPlanF) !!}" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> PLANIFICACIÓN</a>
                                @endif
                                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


@stop
