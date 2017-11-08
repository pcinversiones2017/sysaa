@extends('layout.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Crear Usuario</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'usuario.actualizar']) !!}
                        {!! Form::hidden('codUsu', $usuario->codUsu) !!}
                        <div class="col-md-6 b-r">
                            {!! Field::email('email',$usuario->email) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('nombres',$usuario->nombres) !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('materno',$usuario->materno) !!}
                            <div class="hr-line-dashed"></div>

                        </div>
                        <div class="col-md-6 b-r">
                            {!! Field::text('username', $usuario->username) !!}
                            <div class="hr-line-dashed"></div>
                            
                            {!! Field::password('password') !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::text('paterno',$usuario->paterno) !!}
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-outline" value="ACTUALIZAR">
                                <a href="{!! route('usuario.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
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