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

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <button class="btn btn-primary " data-toggle="modal" data-target="#myModalHorizontal">
                                                            <i class="fa fa-plus"></i> Crear Objetivo Especifico
                                                        </button>
                                                    </div>
                                                </div>
                                                <table class="table table-bordered" style="margin-top: 10px">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Detalle</th>
                                                            <th>MacroProceso</th>
                                                            <th>Materia a examinar</th>
                                                            <th>Procesos</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=1 ; ?>
                                                        @foreach($auditoria->objetivoGeneral->objetivosEspecificos as $objetivoEsp)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>{{$objetivoEsp->nombre}}</td>
                                                                <td>{{$objetivoEsp->macroproceso->nombre}}</td>
                                                                <td>{{$objetivoEsp->materia}}</td>
                                                                <td></td>
                                                                <td>
                                                                <a href="" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a>
                                                                <a href="" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a>
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
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Crear Objetivo Especifico
                    </h4>
                </div>
                <form class="form-horizontal" role="form" method="post" action="{{URL::to('objetivo-especifico/guardar')}}">
                <!-- Modal Body -->

                <div class="modal-body">

                    <div class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" name="codObjGen" value="{{$auditoria->objetivoGeneral->codObjGen}}">
                        <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                    for="inputEmail3">Detalle</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="nombre"> </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"
                                   for="materia" >Materia a examinar </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="materia" name="materia" />
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2">Macroproceso</label>
                            <div class="col-sm-10">
                            <select class="form-control m-b" name="codMacroP">
                                <option>-- Seleccione --</option>
                                @foreach($auditoria->macroprocesos as $macroproceso)
                                <option value="{{$macroproceso->codMacroP}}">{{$macroproceso->nombre}}</option>
                                @endforeach

                            </select>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop