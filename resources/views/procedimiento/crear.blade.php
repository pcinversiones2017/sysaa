@extends('layout.admin')

@section('css-style')
{!! Html::style('css/plugins/datapicker/datepicker3.css') !!}
@stop
@section('content')
@if($usuariorol->isEmpty())
    <div class="alert alert-danger  alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        DEBE <a class="alert-link" href="{{ url('asignar-rol/crear')}}/{{$codPlanF}}">CREAR </a> COMISIÓN AUDITORA PARA QUE PUEDA CONTINUAR
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        CREAR PROCEDIMIENTO
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {!! Form::open(['method' => 'POST', 'route' => 'procedimiento.registrar']) !!}
                            <div class="col-md-12 b-r">
                                {!! Form::hidden('codPlanF',$codPlanF) !!}
                                {!! Form::hidden('codObjEsp',$codObjEsp) !!}
                                {!! Form::hidden('codObjEsp',$codObjEsp) !!}
                                {!! Field::textarea('justificacion', ['rows' => 4]) !!}
                                <div class="hr-line-dashed"></div>

                                {!! Field::textarea('detalle', ['rows' => 4]) !!}
                                <div class="hr-line-dashed"></div>

                                <div class="form-group" id="fecha-fin">
                                    <label class="">Fecha Fin</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fechafin" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <label>Usuario</label>
                                <select name="codUsuRol" class="form-control">
                                    @foreach($usuariorol as $row)
                                        <option value="{!! $row->codUsuRol !!}">{!! $row->usuario->datos !!}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('codUsuRol'))
                                    <p style="color:#a94442">{{$errors->first('codUsuRol')}}</p>
                                @endif

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    @if($usuariorol->isNotEmpty())
                                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                                    @endif
                                    <a href="{!! url('objetivo-especifico/mostrar')!!}/{{$codPlanF}}/{{$codObjEsp}}" class="btn btn-danger btn-outline">ATRAS</a>
                                </div>
                                <div class="hr-line-dashed"></div>

                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

    </div>
</div>
@stop

@section('js-script')
{!! Html::script('js/plugins/datapicker/bootstrap-datepicker.js') !!}
<script>
    $(document).ready(function(){

        $('#fecha-fin .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd-mm-yyyy"
        });

    });

</script>
@stop