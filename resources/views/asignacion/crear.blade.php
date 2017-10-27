@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Asignar </h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'asignarr.registrar']) !!}
                        <div class="col-md-6 b-r">
                            <label>USUARIO</label>
                            {!! Form::select('usuario',$usuario,null,['class' => 'form-control']) !!}
                            <div class="hr-line-dashed"></div>

                            <label>ROL</label>
                            {!! Form::select('rol',$rol,null,['class' => 'form-control']) !!}
                            <div class="hr-line-dashed"></div>

                            <label>CARGO FUNCIONAL</label>
                            {!! Form::select('cargo',$cargo,null,['class' => 'form-control']) !!}
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="REGISTRAR">
                                <a href="{!! route('asignarr.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
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