@extends('layout.admin')
@section('css-style')
    <link href="{{url('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Crear Auditoria</h5>
            </div>
            <div class="ibox-content">
                <div class="row">

                        {!! Form::open(['method' => 'POST', 'route' => 'auditoria.guardar']) !!}
                        {{csrf_field()}}
                        <div class="col-md-6 b-r">
                            {!! Field::text('nombrePlanF', ['label' => 'Nombre Auditoria']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('codigoServicioCP', ['label' => 'Código del servicio de control posterior']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('tipoServicioCP', ['label' => 'Tipo de servicio de control posterior']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('organoCI', ['label' => 'Órgano de control institucional']) !!}
                            <div class="hr-line-dashed"></div>
                        </div>

                        <div class="col-md-6">

                            {!! Field::text('entidadAuditada', ['label' => 'Entidad Auditada']) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('tipoDemanda', ['label' => 'Tipo de demanda de control (demanda autogenerada / demanda imprevisible)']) !!}
                            <div class="hr-line-dashed"></div>

                            <label class="">Plan</label>
                            {!! Form::select('codPlanA', $planes, null, ['class' => 'form-control'] ) !!}

                            <div class="hr-line-dashed"></div>

                            <label class="">Periodo inicio - Periodo Final</label>
                            <input id="perido" class="form-control" type="text" name="periodo" value="{{$periodo}}" />


                        </div>

                        <div class="col-md-12">
                            <div class="form-group"><label class="">Origen</label>
                                {!! Form::textarea('origen', null, ['class' => 'form-control', 'size' => '50x5']) !!}
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="">Objetivo General</label>
                                {!! Form::textarea('nombreObjetivoGeneral', null, ['class' => 'form-control', 'size' => '50x5']) !!}
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
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