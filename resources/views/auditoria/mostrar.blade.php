@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <a href="#" class="btn btn-white btn-xs pull-right">Edit project</a>
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
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">Objetivo General</a></li>
                                                <li class=""><a href="#tab-2" data-toggle="tab">Objetivo Especifico</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                @if(empty($auditoria->objetivoGeneral->nombre))
                                                <form method="post" action="{{URL::to('objetivo-general/guardar')}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
                                                    <div class="col-md-12">
                                                        <div class="form-group"><label class="">Objetivo General</label>
                                                            <textarea class="form-control" name="nombre"></textarea>
                                                        </div>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                @else
                                                <div>
                                                    <h5>{{$auditoria->objetivoGeneral->nombre}}</h5>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="tab-pane" id="tab-2">
                                                @include('objetivo_especifico.partials.listar')
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Crear Objetivo Especifico -->
    @include('objetivo_especifico.modals.crear')
@stop