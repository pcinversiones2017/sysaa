@extends('layout.admin')
@section('css-style')
    {!! Html::style('css/plugins/alertifyjs/themes/default.css') !!}
    {!! Html::style('css/plugins/alertifyjs/alertify.min.css') !!}
    {!! Html::style('css/plugins/dataTables/datatables.min.css') !!}
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('partials.alert')
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <a href="{{URL::to('auditoria/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-primary btn-outline pull-right" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i> EDITAR</a>
                                    <h2>{{$auditoria->nombrePlanF}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-horizontal">
                                    <div class="form-group"><label class="col-lg-6 control-label">Estado:</label>
                                        <h5 class="text-left " style="padding-top: 5px"><span class="label label-primary">Activo</span></h5>
                                    </div>

                                    <div class="form-group"><label class="col-lg-6 control-label">Creado por:</label>
                                        <h5 class="text-left " style="padding-top: 5px">César Herbozo</h5>
                                    </div>
                                    <div class="form-group"><label class="col-lg-6 control-label">Código del servicio de control posterior:</label>
                                        <h5 class="text-left " style="padding-top: 5px">{{$auditoria->codigoServicioCP}}</h5>
                                    </div>
                                    <div class="form-group"><label class="col-lg-6 control-label">Tipo de servicio de control posterior:</label>
                                        <h5 class="text-left " style="padding-top: 5px">{{$auditoria->tipoServicioCP}}</h5>
                                    </div>
                                    <div class="form-group"><label class="col-lg-6 control-label">Organo de control institucional:</label>
                                        <h5 class="text-left " style="padding-top: 5px">{{$auditoria->organoCI}}</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5" id="cluster_info">

                                <div class="form-horizontal">
                                    <div class="form-group"><label class="col-lg-6 control-label">Fecha de Creación</label>
                                        <h5 class="text-left " style="padding-top: 5px">{{$auditoria->fecha_creado}}</h5>
                                    </div>

                                    <div class="form-group"><label class="col-lg-6 control-label">Entidad Auditada:</label>
                                        <h5 class="text-left " style="padding-top: 5px">{{$auditoria->entidadAuditada}}</h5>
                                    </div>
                                    <div class="form-group"><label class="col-lg-6 control-label">Participantes: </label>
                                        <h5 class="text-left " style="padding-top: 5px"></h5>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Completado:</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                        <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> ORIGEN
                                    </div>
                                    <div class="panel-body">
                                        <p>{{$auditoria->origen}}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> OBJETIVO GENERAL
                                    </div>
                                    <div class="panel-body">
                                        <p>{{$auditoria->objetivoGeneral->nombre}}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> OBJETIVO ESPECÍFICO
                                    </div>
                                    <div class="panel-body">
                                        @include('objetivo_especifico.partials.listar')
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> PERIODO A EXAMINAR
                                    </div>
                                    <div class="panel-body">
                                        <h5>DESDE {{ date('d-m-Y', strtotime($auditoria->periodoIniPlanF))}} HASTA {{ date('d-m-Y', strtotime($auditoria->periodoFinPlanF)) }}</h5>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> COMISIÓN AUDITORA
                                    </div>
                                    <div class="panel-body">
                                        @include('asignacion.partials.listar')
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="fa fa-info-circle"></i> CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS
                                    </div>
                                    <div class="panel-body">
                                        @include('cronograma.partials.mostrar')
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