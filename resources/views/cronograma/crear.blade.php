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
                    <form method="get" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">SELECCIONAR PLAN</label>
                            <div class="col-sm-4">
                            <select class="form-control" id="sel1" name="codPlanf[]">
                                <option value="0">::SELECCIONE::</option>
                                @foreach($planes as $plan)
                                    <option value="{{$plan->codPlanA}}">{{$plan->nombrePlan}}</option>
                                @endforeach

                            </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success"><label class="col-sm-1 control-label">PLANIFICACION</label>
                        </div>
                        @foreach($etapasPlanificacion as $etapaPlanificacion)
                        <div class="form-group">
                                <label class="col-sm-4 ">{{$etapaPlanificacion['nombre']}}</label>
                                <input type="hidden" value="{{$etapaPlanificacion['codEtp']}}"
                                       name="etapa{{$etapaPlanificacion['codEtp']}}[]">
                            <div class="col-sm-7">
                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date"
                                           name="fechaIni{{$etapaPlanificacion['codEtp']}}[]" >
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date"
                                           name="fechaFin{{$etapaPlanificacion['codEtp']}}[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control"
                                           name="dias_habiles{{$etapaPlanificacion['codEtp']}}[]">
                                </div>
                            </div>
                        </div>
                            @endforeach
                        <div class="form-group">
                            <label class="col-sm-4 ">ELABORACIÓN Y APROBACIÓN DEL PLAN DE AUDITORÍA DEFINITIVO.<br>
                                REGISTRO DEL PLAN DE AUDITORÍA DEFINITIVO.</label>
                            <input type="hidden" value="3"
                                   name="etapa3">
                            <input type="hidden" value="4"
                                   name="etapa4">

                            <div class="col-sm-7">
                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" name="fechaIni3[]">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" name="fechaFin3[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control3[]"
                                           name="dias_habiles">
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
                                   name="etapa5[]">
                            <input type="hidden" value="6"
                                   name="etapa6[]">
                            <input type="hidden" value="7"
                                   name="etapa7[]">
                            <input type="hidden" value="8"
                                   name="etapa8[]">
                            <input type="hidden" value="9"
                                   name="etapa9[]">
                            <input type="hidden" value="10"
                                   name="etapa10[]">

                            <div class="col-sm-7" style="margin-top: 30px;">

                                <label class="col-sm-12" style="color: red; ">*ESTAS ACTIVIDADES COMPARTEN FECHA INICIO
                                    , FECHA FIN Y DIAS HABILES</label>

                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" name="fechaIniEje[]">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" name="fechaFinEje[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control"
                                           name="dias_habilesEje[]">
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
                                   name="etapa11[]">
                            <input type="hidden" value="12"
                                   name="etapa12[]">
                            <input type="hidden" value="13"
                                   name="etapa13[]">

                            <div class="col-sm-7" STYLE="margin-top: -8px;">

                                <label class="col-sm-12" style="color: red; ">*ESTAS ACTIVIDADES COMPARTEN FECHA INICIO
                                    , FECHA FIN Y DIAS HABILES</label>

                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" name="fechaIniRep[]">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date" name="fechaFinRep[]">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control"
                                           name="dias_habilesRep[]">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <!-- total de dias habiles------------------------------------------------------------------->
                        <div class="col-md-12">
                        <div class="form-group has-success col-sm-6">
                            <label class="col-md-12 control-label">TOTAL DE DIAS HABILES</label>
                        </div>
                        <div class="col-md-2 col-md-offset-3">
                            <input type="number" placeholder="Dias habiles" class="form-control">
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop