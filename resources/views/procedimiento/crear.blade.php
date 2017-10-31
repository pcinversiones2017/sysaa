@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Crear Procedimiento</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'procedimiento.registrar']) !!}
                        <div class="col-md-12 b-r">
                            {!! Form::hidden('id',$id) !!}
                            {!! Field::textarea('justificacion') !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::textarea('detalle') !!}
                            <div class="hr-line-dashed"></div>
                            {!! Field::date('fechafin',['label' => 'Fecha Fin']) !!}

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                <a href="{!! url('objetivo-especifico/mostrar/'.$id) !!}" class="btn btn-danger btn-outline">ATRAS</a>
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