@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        ACTUALIZAR PROCEDIMIENTO
                    </div>
                    <div class="panel-body">
                        <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'procedimiento-general.actualizar']) !!}
                        {!! Form::hidden('codProc', $procedimiento->codProc) !!}
                        <div class="col-md-12 b-r">
                            {!! Form::hidden('codPlanF',$codPlanF) !!}
                            {!! Form::hidden('codProc',$codProc) !!}
                            {!! Field::textarea('justificacion', $procedimiento->justificacion) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::textarea('detalle', $procedimiento->detalle) !!}
                            <div class="hr-line-dashed"></div>
                            {!! Field::date('fechafin', $procedimiento->fecha_fin,['label' => 'Fecha Fin']) !!}

                            <div class="hr-line-dashed"></div>
                            <label>Usuario</label>
                            <select name="codUsuRol" class="form-control">
                                @foreach($usuariorol as $row)
                                <option value="{!! $row->codUsuRol !!}" {{$row->codUsuRol == $procedimiento->codUsuRol? 'selected':'' }}>{!! $row->usuario->datos !!}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                                <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>
@stop