@extends('layout.admin')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR USUARIO {{$usuario->datos}}
        </div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => 'usuario.actualizar']) !!}
                {!! Form::hidden('codUsu', $usuario->codUsu) !!}

                <div class="col-md-6 b-r">
                    {!! Field::text('username', $usuario->username, ['disabled' => 'disabled']) !!}
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