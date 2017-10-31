@extends('layout.admin')
@section('css-style')
    <link href="{{url('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">

@stop
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

                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[0]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[1]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[2]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[3]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[4]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[5]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[6]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[7]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[8]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[9]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[10]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[11]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[12]}}">
                        <input type="hidden" name="codCroGen[]" value="{{$codCroGen[10]}}">

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
                                    <div class="col-sm-8 form-group" id="data_5">
                                        <div class="input-group input-daterange" id="datepicker">
                                            <input placeholder="Fecha de inicio" type="text" class="input-sm form-control"
                                                   value=" {{date('d/m/Y',strtotime($fechasIni[$i]))}}" name="fechaIni[]" />
                                            <span class="input-group-addon">AL</span>
                                            <input placeholder="Fecha de fin" type="text" class="input-sm form-control"
                                                   value=" {{date('d/m/Y',strtotime($fechaFin[$i]))}}" name="fechaFin[]"  />
                                        </div>
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
                                <div class="col-sm-8 form-group" id="data_5">
                                    <div class="input-group input-daterange" id="datepicker">
                                        <input placeholder="Fecha de inicio" type="text" class="input-sm form-control"
                                               value=" {{date('d/m/Y',strtotime($fechasIni[2]))}}" name="fechaIni[]" />
                                        <span class="input-group-addon">AL</span>
                                        <input placeholder="Fecha de fin" type="text" class="input-sm form-control"
                                               value=" {{date('d/m/Y',strtotime($fechaFin[2]))}}" name="fechaFin[]"  />
                                    </div>
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

                                <div class="col-sm-8 form-group" id="data_5">
                                    <div class="input-group input-daterange" id="datepicker">
                                        <input placeholder="Fecha de inicio" type="text" class="input-sm form-control"
                                               value=" {{date('d/m/Y',strtotime($fechasIni[3]))}}" name="fechaIni[]" />
                                        <span class="input-group-addon">AL</span>
                                        <input placeholder="Fecha de fin" type="text" class="input-sm form-control"
                                               value=" {{date('d/m/Y',strtotime($fechaFin[3]))}}" name="fechaFin[]"  />
                                    </div>
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

                                <div class="col-sm-8 form-group" id="data_5">
                                    <div class="input-group input-daterange" id="datepicker">
                                        <input placeholder="Fecha de inicio" type="text" class="input-sm form-control"
                                               value=" {{date('d/m/Y',strtotime($fechasIni[4]))}}" name="fechaIni[]" />
                                        <span class="input-group-addon">AL</span>
                                        <input placeholder="Fecha de fin" type="text" class="input-sm form-control"
                                               value=" {{date('d/m/Y',strtotime($fechaFin[4]))}}" name="fechaFin[]"  />
                                    </div>
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

@section('js-script')

    <script src="{{url('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{url('js/plugins/daterangepicker/daterangepicker.js')}}"></script>


    <script>
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
    </script>
@stop