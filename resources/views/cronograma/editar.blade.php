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
                            EDITAR CRONOGRAMA <small>CRONOGRAMA Y PLAZOS DE ENTREGA DE DOCUMENTOS (*)</small>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                {!! Form::open(['method' => 'POST', 'route' => 'cronograma.actualizar']) !!}

                                    <div class="col-md-12">
                                        {!! Field::hidden('codPlanF', $codPlanF) !!}
                                        <label class="control-label">NOMBRE DE AUDITORIA</label>
                                        <select class="form-control" id="sel1" name="codPlanF" disabled>
                                            <option value=""> -- SELECCIONE -- </option>
                                            @foreach($auditorias as $auditoria)
                                                <option value="{{$auditoria->codPlanF}}" {{$auditoria->codPlanF == $codPlanF ? 'selected' : ''}}>{{$auditoria->nombrePlanF}}</option>
                                            @endforeach
                                        </select>
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
                                            @foreach($cronograma as $row)
                                                {!! Field::hidden('codEtp[]', $row->etapa->codEtp) !!}
                                                @if($row->etapa->tipo != $aux)
                                                    <tr><td>
                                                            <label class="has-success">{{$row->etapa->tipo}}</label>
                                                        </td>
                                                        <td></td><td></td>

                                                    </tr>
                                                    <?php $aux = $row->etapa->tipo?>
                                                @endif
                                                <tr>
                                                    <td>{!! nl2br($row->etapa->nombre) !!}</td>
                                                    <td  style="vertical-align: middle">
                                                        <div class="col-md-12 form-group" id="data_5" style="margin-top: 15px">
                                                            <div class="input-group input-daterange" id="datepicker">
                                                                <input placeholder="Fecha de inicio" type="text" class="form-control"
                                                                value="{{ $row->fecha_ini }}" name="fecha_ini[]" />
                                                                <span class="input-group-addon">AL</span>
                                                                <input placeholder="Fecha de fin" type="text" class="form-control"
                                                                value="{{ $row->fecha_fin }}" name="fecha_fin[]" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td  style="vertical-align: middle"><input placeholder="Días Hábiles" type="number" name="dias_habiles[]" class="form-control" value="{{$row->dias_habiles}}"></td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div class="form-group">
                                            <div class="col-lg-12 col-md-12">
                                                <button class="btn btn-success btn-outline" type="submit">REGISTRAR</button>
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
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            daysOfWeekDisabled : [0,6],
            format: 'd-m-yyyy'
        });


    </script>

@stop