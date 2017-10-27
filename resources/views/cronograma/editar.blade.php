@extends('layout.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Crear Cronograma <small>CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS (*)</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{URL::to('cronograma/actualizar')}}">
                        {{ csrf_field() }}
                        <div class="form-group"><label class="col-sm-2 control-label">NOMBRE DE AUDITORIA: </label>
                            <label class="col-sm-2 control-label">{{$auditoria->nombrePlanF}}</label>
                            <input type="hidden" value="{{$auditoria->codPlanF}}"
                                   name="codPlanf[]">
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success"><label class="col-sm-1 control-label">PLANIFICACION</label>
                        </div>
                        <?php $i=0;?>
                        @foreach($etapasPlanificacion as $etapaPlanificacion)
                            <div class="form-group">
                                <label class="col-sm-4 ">{{$etapaPlanificacion['nombre']}}</label>
                                <input type="hidden" value="{{$etapaPlanificacion['codEtp']}}"
                                       name="etapa[]">
                                <div class="col-sm-7">
                                    <div class="col-md-4 ">
                                        <input placeholder="Fecha de inicio" class="form-control" type="text"
                                               onfocus="(this.type='date')"  id="date"
                                               value=" {{$fechasIni[$i]}}"  name="fechaIni[]" >
                                    </div>
                                    <div class="col-md-4">
                                        <input placeholder="Fecha de fin" class="form-control" type="text"
                                               onfocus="(this.type='date')"  id="date"
                                               value="{{$fechaFin[$i]}}" name="fechaFin[]">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" placeholder="Dias habiles" class="form-control"
                                               value="{{$dias_habiles[$i]}}" name="dias_habiles[]">
                                    </div>
                                </div>
                            </div>
                            <?php $i++;?>
                        @endforeach
                        <div class="form-group">
                            <label class="col-sm-4 ">ELABORACIÓN Y APROBACIÓN DEL PLAN DE AUDITORÍA DEFINITIVO.<br>
                                REGISTRO DEL PLAN DE AUDITORÍA DEFINITIVO.</label>
                            <input type="hidden" value="3"
                                   name="etapa[]">
                            <input type="hidden" value="4"
                                   name="etapa[]">
                            <div class="col-sm-7">
                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" value="{{$fechasIni[2]}}"
                                           name="fechaIni[]">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date"  value="{{$fechaFin[2]}}"
                                           name="fechaFin[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control"
                                           value="{{$dias_habiles[2]}}"
                                           name="dias_habiles[]">
                                </div>
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>
                        <!-- EJECUCION ------------------------------------------------------------------------>
                        <div class="form-group has-success"><label class="col-sm-1 control-label">EJECUCION</label>
                        </div>
                        <div class="form-group">

                            <label class="col-sm-4">@foreach($etapaseEjecucion as $etapaseEjecucion)
                                    {{$etapaseEjecucion['nombre']}}<BR><BR> @endforeach</label>
                            <input type="hidden" value="5"
                                   name="etapa[]">
                            <input type="hidden" value="6"
                                   name="etapa[]">
                            <input type="hidden" value="7"
                                   name="etapa[]">
                            <input type="hidden" value="8"
                                   name="etapa[]">
                            <input type="hidden" value="9"
                                   name="etapa[]">
                            <input type="hidden" value="10"
                                   name="etapa[]">
                            <div class="col-sm-7" style="margin-top: 30px;">

                                <label class="col-sm-12" style="color: red; ">*ESTAS ACTIVIDADES COMPARTEN FECHA INICIO
                                    , FECHA FIN Y DIAS HABILES</label>

                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" value="{{$fechasIni[3]}}"
                                           name="fechaIni[]">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date"  value="{{$fechaFin[3]}}"
                                           name="fechaFin[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control"
                                           value="{{$dias_habiles[3]}}"
                                           name="dias_habiles[]">
                                </div>
                            </div>
                        </div>
                        <!-- ELABORACION DE INFORME ------------------------------------------------------------------->
                        <div class="form-group has-success"><label class="col-sm-1 control-label">EJECUCION</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 ">@foreach($etapasReporte as $etapasReporte)
                                    {{$etapasReporte['nombre']}}<BR><BR>
                                @endforeach
                            </label>
                            <input type="hidden" value="11"
                                   name="etapa[]">
                            <input type="hidden" value="12"
                                   name="etapa[]">
                            <input type="hidden" value="13"
                                   name="etapa[]">


                            <div class="col-sm-7" STYLE="margin-top: -8px;">

                                <label class="col-sm-12" style="color: red; ">*ESTAS ACTIVIDADES COMPARTEN FECHA INICIO
                                    , FECHA FIN Y DIAS HABILES</label>

                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" value="{{$fechasIni[4]}}"
                                           name="fechaIni[]">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date"  value="{{$fechaFin[4]}}"
                                           name="fechaFin[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control"
                                           value="{{$dias_habiles[4]}}"
                                           name="dias_habiles[]">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit">Cancelar</button>
                                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop