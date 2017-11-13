@extends('layout.admin')
@section('css-style')
    <link href="{{url('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            CREAR CRONOGRAMA <small>CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS (*)</small>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                {!! Form::open(['method' => 'POST', 'route' => 'cronograma.guardar']) !!}

                                    <div class="col-md-12">
                                        {!! Form::hidden('codPlanF', $auditoria->codPlanF) !!}
                                        {!! Field::text('',  $auditoria->nombrePlanF, ['label' => 'AUDITORIA', 'disabled' => 'disabled']) !!}
                                        @if($errors->has('codPlanF'))
                                        <label class="error has-error">{{$errors->first()}}</label>
                                        @endif
                                        <br><br>

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>ETAPAS / ACTIVIDADES</th>
                                                <th width="40%">FECHAS</th>
                                                <th width="15%">DÍAS HÁBILES</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php  $aux = '' ?>
                                            @foreach($etapas as $etapa)
                                                {!! Field::hidden('codEtp[]', $etapa->codEtp) !!}
                                                @if($etapa->tipo != $aux)
                                                    <tr><td>
                                                            <label class="has-success">{{$etapa->tipo}}</label>
                                                        </td>
                                                        <td></td><td></td>

                                                    </tr>
                                                    <?php $aux = $etapa->tipo?>
                                                @endif
                                                <tr>
                                                    <td>{!! nl2br($etapa->nombre) !!}</td>
                                                    <td  style="vertical-align: middle">
                                                        <div class="col-md-12 form-group" id="data_5" style="margin-top: 15px">
                                                            <div class="input-group input-daterange" id="datepicker">
                                                                <input placeholder="Fecha de inicio" type="text" class="form-control"
                                                                       value="{{old('fecha_ini[]')}}" name="fecha_ini[]" />
                                                                {{--{!! Field::text('fecha_ini[]', null, ['class' => 'form-control', 'placeholder' => 'Fecha de inicio', 'label' => '']) !!}--}}
                                                                        <span class="input-group-addon">AL</span>
                                                                {{--{!! Field::text('fecha_fin[]', null, ['class' => 'form-control', 'placeholder' => 'Fecha de fin', 'label' => '']) !!}--}}
                                                                <input placeholder="Fecha de fin" type="text" class="form-control"
                                                                       value="{{old('fecha_fin[]')}}" name="fecha_fin[]"  />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td  style="vertical-align: middle"><input placeholder="Días Hábiles" type="number" name="dias_habiles[]" class="form-control"></td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12">
                                                <button class="btn btn-success btn-outline" type="submit"><i class="fa fa-save"></i> REGISTRAR</button>
                                                <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                                            </div>
                                        </div>
                                    </div>

                                {{ Form::close() }}
                            </div>

                        </div>

                    </div>

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
            daysOfWeekDisabled : [0,6],
            format: 'd-m-yyyy'
        });


    </script>

@stop