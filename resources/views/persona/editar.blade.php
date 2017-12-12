@extends('layout.admin')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR PERSONA
        </div>
        <div class="panel-body">
            <div class="row">
                {!! Form::open(['method' => 'POST', 'route' => 'persona.actualizar']) !!}
                <div class="col-md-6 b-r">
                    {!! Field::hidden('codPer', $persona->codPer) !!}
                    {!! Field::text('nombres', $persona->nombres) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::text('paterno', $persona->paterno) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::text('materno', $persona->materno) !!}
                    <div class="hr-line-dashed"></div>

                    {!! Field::email('email', $persona->email) !!}
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                        <a href="{!! route('persona.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop