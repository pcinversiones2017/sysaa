@extends('layout.admin')
@section('css-style')
    <link href="{{url('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>CREAR AUDITORIA</h5>
            </div>
            <div class="ibox-content">
                <div class="row">

                        {!! Form::open(['method' => 'POST', 'route' => 'auditoria.guardar']) !!}
                        {{csrf_field()}}
                        <div class="col-md-6 b-r">
                            {!! Field::text('nombrePlanF', ['label' => 'NOMBRE AUDITORIA']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('codigoServicioCP', ['label' => 'CODIGO DEL SERVICIO DE CONTROL POSTERIOR']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('tipoServicioCP', ['label' => 'TIPO DE SERVICIO DE CONTROL POSTERIOR']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('organoCI', ['label' => 'ÓRGANO DE CONTROL INSTITUCIONAL']) !!}
                            <div class="hr-line-dashed"></div>
                        </div>

                        <div class="col-md-6">

                            {!! Field::text('entidadAuditada', ['label' => 'ENTIDAD AUDITADA']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('tipoDemanda', ['label' => 'TIPO DE DEMANDA DE CONTROL (demanda autogenerada / demanda imprevisible)']) !!}
                            <div class="hr-line-dashed"></div>

                            <label class="">PLAN</label>
                            {!! Form::select('codPlanA', $planes, null, ['class' => 'form-control'] ) !!}

                            <div class="hr-line-dashed"></div>

                            <label class="">PERIÓDO INICIO - PERIÓDO FIN</label>
                            <input id="perido" class="form-control" type="text" name="periodo" value="{{$periodo}}" />


                        </div>

                        <div class="col-md-12">
                            <div class="form-group"><label class="">ORÍGEN</label>
                                {!! Form::textarea('origen', null, ['class' => 'form-control', 'size' => '50x5']) !!}
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">OBJETIVO GENERAL</label>
                                {!! Form::textarea('nombreObjetivoGeneral', null, ['class' => 'form-control', 'size' => '50x5']) !!}
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                    <button class="btn btn-primary btn-outline" type="submit">REGISTRAR </button>
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
            "format": "DD/MM/YYYY",
            "separator": " hasta "
        });
    </script>
@stop