@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Actualizar Procedimiento</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'procedimiento.actualizar']) !!}
                        {!! Form::hidden('codProc', $procedimiento->codProc) !!}
                        <div class="col-md-12 b-r">
                            {!! Form::hidden('codPlanF',$codPlanF) !!}
                            {!! Form::hidden('codObjEsp',$codObjEsp) !!}
                            {!! Form::hidden('codProc',$codProc) !!}
                            {!! Field::textarea('justificacion', $procedimiento->justificacion) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::textarea('detalle', $procedimiento->detalle) !!}
                            <div class="hr-line-dashed"></div>
                            {!! Field::date('fechafin', $procedimiento->fecha_fin,['label' => 'Fecha Fin']) !!}

                            <div class="hr-line-dashed"></div>
                            <label>Usuario</label>
                            <select name="codusurol" class="form-control">
                                @foreach($usuariorol as $row)
                                <option value="{!! $row->codUsuRol !!}" {{$row->codUsuRol == $procedimiento->codUsuRol? 'selected':'' }}>{!! $row->usuario->datos !!}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                                <a href="{!! url('objetivo-especifico/mostrar/' . $codPlanF . '/' . $codObjEsp) !!}" class="btn btn-danger btn-outline">ATRAS</a>
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