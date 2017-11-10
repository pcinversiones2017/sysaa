@extends('layout.admin')

@section('content')
@include('partials.alert') 
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cambiar Contraseña</h5>

            </div>
            <div class="ibox-content">
                <div class="row">
                    {!! Form::open(['method' => 'POST', 'route' => 'usuario.cambiar']) !!}
                    {!! Form::hidden('codUsu', Auth::user()->codUsu ) !!}
                        <div class="col-md-6 b-r">

                            {!! Field::password('password') !!}
                            <div class="hr-line-dashed"></div>

                            {!! Field::password('password_confirmation') !!}
                            <div class="hr-line-dashed"></div>
							
							{!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-primary btn-outline']) !!}
							<div class="hr-line-dashed"></div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@stop