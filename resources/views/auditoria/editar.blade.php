@extends('layout.admin')
@section('css-style')
    <link href="{{url('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>EDITAR AUDITORIA</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        {!! Form::open(['method' => 'POST', 'route' => 'auditoria.actualizar']) !!}
                            {{csrf_field()}}
                            <input type="hidden" name="codPlanF" value="{{$auditoria->codPlanF}}">
                            <div class="col-md-6 b-r">
                                {!! Field::text('nombrePlanF', $auditoria->nombrePlanF, ['label' => 'NOMBRE AUDITORIA']) !!}
                                <div class="hr-line-dashed"></div>

                                {!! Field::text('codigoServicioCP', $auditoria->codigoServicioCP, ['label' => 'CÓDIGO DEL SERVICIO DEL SERVICIO DE CONTROL POSTERIOR']) !!}
                                <div class="hr-line-dashed"></div>

                                {!! Field::text('tipoServicioCP', $auditoria->tipoServicioCP, ['label' => 'TIPO DE SERVICIO DE CONTROL POSTERIOR']) !!}
                                <div class="hr-line-dashed"></div>

                                {!! Field::text('organoCI', $auditoria->organoCI, ['label' => 'ÓRGANO DE CONTROL INSTITUCIONAL']) !!}
                                <div class="hr-line-dashed"></div>

                            </div>

                            <div class="col-md-6">
                                {!! Field::text('entidadAuditada', $auditoria->entidadAuditada, ['label' => 'ENTIDAD AUDITADA']) !!}
                                <div class="hr-line-dashed"></div>

                                {!! Field::text('tipoDemanda', $auditoria->tipoDemanda, ['label' => 'TIPO DE DEMANDA DE CONTROL (demanda autogenerada / demanda imprevisible)']) !!}
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="">PLAN</label>
                                    {!! Form::select('codPlanA', $planes, $auditoria->planAnual->codPlanA, ['class' => 'form-control m-b'] ) !!}
                                </div>
                                <div class="hr-line-dashed"></div>

                                <label class="">PERIODO INICIO - PERIODO FIN</label>
                                <input id="perido" class="form-control" type="text" name="periodo" value="{{$periodo}}" />

                            </div>

                            <div class="col-md-12">
                                <div class="form-group"><label class="">ORÍGEN</label>
                                    {!! Form::textarea('origen', $auditoria->origen, ['class' => 'form-control', 'size' => '50x5']) !!}

                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="">OBJETIVO GENERAL</label>
                                    {!! Form::textarea('nombreObjetivoGeneral', $auditoria->objetivoGeneral->nombre, ['class' => 'form-control', 'size' => '50x5']) !!}
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-outline" type="submit">ACTUALIZAR</button>
                                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRÁS</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('js-script')

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="{{url('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <!-- Date range picker -->
    <script src="{{url('js/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script>

        $('input[name="periodo"]').daterangepicker({
            "applyLabel": "Aplicar",
            "format": "DD-MM-YYYY",
            "separator": " hasta "
        });
    </script>
@stop