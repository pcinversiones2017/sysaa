@extends('layout.admin')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR USUARIO
        </div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => 'usuario.actualizar']) !!}
                {!! Form::hidden('codUsu', $usuario->codUsu) !!}
                <div class="col-md-6 b-r">
                    {!! Field::text('nombres',$usuario->nombres) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::text('materno',$usuario->materno) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::text('paterno',$usuario->paterno) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::email('email',$usuario->email) !!}
                    <div class="hr-line-dashed"></div>

                </div>
                <div class="col-md-6 b-r">
                    {!! Field::text('username', $usuario->username) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::password('password') !!}
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                        <a href="{!! route('usuario.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>
                    <div class="hr-line-dashed"></div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop