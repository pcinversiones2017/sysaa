@extends('layout.admin')

@section('content')
@include('partials.alert')
<div class="panel panel-success">
    <div class="panel-heading">
        CAMBIAR CONTRASEÑA DE {!! Auth::user()->persona->paterno !!} {!! Auth::user()->persona->materno !!} {!! Auth::user()->persona->nombres !!}
    </div>
    <div class="panel-body">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'usuario.cambiar']) !!}
            {!! Form::hidden('codUsu', Auth::user()->codUsu ) !!}
            <div class="col-md-6 b-r">

                {!! Field::password('password') !!}
                <div class="hr-line-dashed"></div>

                {!! Field::password('password_confirmation') !!}
                <div class="hr-line-dashed"></div>

                <button class = 'btn btn-success btn-outline'><i class="fa fa-save"></i> ACTUALIZAR</button>
                <div class="hr-line-dashed"></div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop