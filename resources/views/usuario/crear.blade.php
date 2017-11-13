@extends('layout.admin')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            CREAR USUARIO
        </div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => 'usuario.registrar']) !!}
                <div class="col-md-6 b-r">

                    {!! Field::text('nombres') !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::text('paterno') !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::text('materno') !!}
                    <div class="hr-line-dashed"></div>
                    
                    {!! Field::email('email') !!}
                    <div class="hr-line-dashed"></div>

                </div>
                <div class="col-md-6 b-r">

                    {!! Field::text('username') !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::password('password') !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::password('password_confirmation') !!}
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                        <a href="{!! route('usuario.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>
                    <div class="hr-line-dashed"></div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop