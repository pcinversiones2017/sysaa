@extends('layout.admin')
@section('css-style')
    <link href="{{url('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

@stop
@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="ibox float-e-margins">

            <div class="ibox-content">
                {!! Form::open(['method' => 'POST', 'route' => 'auditoria.guardar']) !!}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        I. DATOS DE LA AUDITORIA
                    </div>
                    <div class="panel-body">
                        <div class="row">



                            <div class="col-md-6 b-r">
                                {!! Field::text('nombrePlanF', ['label' => 'NOMBRE AUDITORIA']) !!}
                                <div class="hr-line-dashed"></div>

                                {!! Field::text('codigoServicioCP', $codigoServicio, ['label' => 'CODIGO DEL SERVICIO DE CONTROL POSTERIOR', 'readonly' => 'readonly']) !!}
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

                                <div class="form-group" id="data_5">
                                    <label class="">PERIÓDO INICIO - PERIÓDO FIN</label>
                                    <div class="input-daterange input-group col-md-12" id="datepicker">
                                        <input type="text" class="form-control" name="periodoIniPlanF" value="" />
                                        <span class="input-group-addon">A</span>
                                        <input type="text" class="form-control" name="periodoFinPlanF" value="" />
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        II. ORIGEN
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label class=""></label>
                                    {!! Form::textarea('origen', null, ['class' => 'form-control', 'size' => '50x4']) !!}
                                </div>
                                <div class="hr-line-dashed"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                         III. OBJETIVO GENERAL
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label class=""></label>
                                    {!! Form::textarea('nombreObjetivoGeneral', null, ['class' => 'form-control', 'size' => '50x4']) !!}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-outline" type="submit">REGISTRAR </button>
                    <a href="{{url()->previous()}}" class="btn btn-danger btn-outline">ATRÁS</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
@stop

@section('js-script')

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="{{url('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <!-- Date range picker -->
    <script src="{{url('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <script>

        $.fn.datepicker.dates['en'] = {
            days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
            today: "Hoy"
        };

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format : 'dd-mm-yyyy'
        });
    </script>
@stop