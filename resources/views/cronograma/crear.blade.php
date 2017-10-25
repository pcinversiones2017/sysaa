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
                            <select class="form-control" id="sel1">
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
                        <div class="form-group">@foreach($etapasPlanificacion
                        as $etapaPlanificacion)
                                   {{$etapaPlanificacion->nombre}}">{{$etapaPlanificacion->tipo}}
                                @endforeach

                            <div class="col-sm-7">
                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 ">- COMPRENSIÓN DE LA ENTIDAD Y LA(S) MATERIA(S) A EXAMINAR,
                                STABLECIENDO OBJETIVO(S) ESPECÍFICO(S) Y PROCEDIMIENTOS DE AUDITORÍA
                            </label>

                            <div class="col-sm-7">
                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 ">- ELABORACIÓN Y APROBACIÓN
                                DEL PLAN DE AUDITORÍA DEFINITIVO  <BR>-  REGISTRO DEL PLAN DE AUDITORÍA DEFINITIVO.</label>


                            <div class="col-sm-7" style="margin-top: 10px;">
                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <!-- EJECUCION ------------------------------------------------------------------------>
                        <div class="form-group has-success"><label class="col-sm-1 control-label">EJECUCION</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 ">- DEFINICIÓN DE LA MUESTRA DE AUDITORÍA. <BR>
                                - DESARROLLO DE LOS PROCEDIMIENTOS DE AUDITORÍA. <BR>
                                - IDENTIFICACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO
                                (ELABORACIÓN, DISCUSIÓN Y APROBACIÓN DE LA MATRIZ DE LAS DESVIACIONES DE CUMPLIMIENTO).
                                ELABORACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO.<BR>
                                - COMUNICACIÓN DE LAS DESVIACIONES DE CUMPLIMIENTO Y
                                EVALUACIÓN DE COMENTARIOS.<BR>
                                - REGISTRO DEL CIERRE DE LA EJECUCIÓN.
                            </label>

                            <div class="col-sm-7" style="margin-top: 30px;">

                                <label class="col-sm-12" style="color: red; ">*ESTAS ACTIVIDADES COMPARTEN FECHA INICIO
                                    , FECHA FIN Y DIAS HABILES</label>

                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ELABORACION DE INFORME ------------------------------------------------------------------->
                        <div class="form-group has-success"><label class="col-sm-1 control-label">EJECUCION</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 ">-ELABORACIÓN DEL INFORME. <BR>
                                - REVISIÓN, APROBACIÓN Y COMUNICACIÓN. <BR>
                               - REGISTRO DEL INFORME.<BR>

                            </label>

                            <div class="col-sm-7" STYLE="margin-top: -8px;">

                                <label class="col-sm-12" style="color: red; ">*ESTAS ACTIVIDADES COMPARTEN FECHA INICIO
                                    , FECHA FIN Y DIAS HABILES</label>

                                <div class="col-md-4 ">
                                    <input placeholder="Fecha de inicio" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-4">
                                    <input placeholder="Fecha de fin" class="form-control" type="text"
                                           onfocus="(this.type='date')"  id="date">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" placeholder="Dias habiles" class="form-control">
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