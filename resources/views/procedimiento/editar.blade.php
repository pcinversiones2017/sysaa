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
                    @foreach($procedimiento as $row)
                        <div class="col-md-12 b-r">
                            {!! Form::hidden('id',$row->codProc) !!}
                            {!! Form::hidden('oe', $oe) !!}
                            {!! Field::textarea('justificacion', $row->justificacion) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::textarea('detalle', $row->detalle) !!}
                            <div class="hr-line-dashed"></div>
                            {!! Field::date('fechafin', $row->fechafin,['label' => 'Fecha Fin']) !!}

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                                <a href="{!! url('objetivo-especifico/mostrar/'.$row->codProc) !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@stop