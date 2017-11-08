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
                                {{--<div class="col-lg-12">--}}
                                    {{--<a href="{{URL::to('auditoria/editar')}}/{{$auditoria->codPlanF}}" class="btn btn-success btn-outline" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i> EDITAR</a>--}}
                                    {{--<h2></h2>--}}
                                {{--</div>--}}
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        I. DATOS DE LA AUDITORIA
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-lg-5">
                                            <div class="form-horizontal">

                                                <div class="form-group"><label class="col-lg-6 control-label">Nombre Auditoria:</label>
                                                    <h5 class="text-left " style="padding-top: 5px">{{$auditoria->nombrePlanF}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Estado:</label>
                                                    <h5 class="text-left " style="padding-top: 5px"><span class="label label-primary">Activo</span></h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Creado por:</label>
                                                    <h5 class="text-left " style="padding-top: 5px">César Herbozo</h5>
                                                </div>
                                                <div class="form-group"><label class="col-lg-6 control-label">Código del servicio de control posterior:</label>
                                                    <h5 class="text-left " style="padding-top: 5px">{{$auditoria->codigoServicioCP}}</h5>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-lg-5" id="cluster_info">

                                            <div class="form-horizontal">
                                                <div class="form-group"><label class="col-lg-6 control-label">Tipo de servicio de control posterior:</label>
                                                    <h5 class="text-left " style="padding-top: 5px">{{$auditoria->tipoServicioCP}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Organo de control institucional:</label>
                                                    <h5 class="text-left " style="padding-top: 5px">{{$auditoria->organoCI}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Fecha de Creación</label>
                                                    <h5 class="text-left " style="padding-top: 5px">{{$auditoria->fecha_creado}}</h5>
                                                </div>

                                                <div class="form-group"><label class="col-lg-6 control-label">Entidad Auditada:</label>
                                                    <h5 class="text-left " style="padding-top: 5px">{{$auditoria->entidadAuditada}}</h5>
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

                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        III. OBJETIVO GENERAL
                                    </div>
                                    <div class="panel-body">
                                        <p>{{$auditoria->objetivoGeneral->nombre}}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        IV. COMISIÓN AUDITORA
                                    </div>
                                    <div class="panel-body">
                                        @include('asignacion.partials.listar')
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        V. OBJETIVO ESPECÍFICO
                                    </div>
                                    <div class="panel-body">
                                        @include('objetivo_especifico.partials.listar')
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
                                                    <td>{{ date('d-m-Y', strtotime($auditoria->periodoIniPlanF))}}</td>
                                                    <td>HASTA</td>
                                                    <td>{{ date('d-m-Y', strtotime($auditoria->periodoFinPlanF)) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        VII. CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS
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