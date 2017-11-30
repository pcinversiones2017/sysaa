@extends('layout.admin')

@section('css-style')
{!! Html::style('css/plugins/summernote/summernote.css') !!}
{!! Html::style('css/plugins/summernote/summernote-bs3.css') !!}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
        <div class="panel-heading">
            <h4> <strong> CARGAR ARCHIVO </strong></h4>
        </div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>NOTA: PESO MAXIMO 5 MB</strong>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'informe.archivo.registrar', 'files' => true]) !!}
                    {!! Form::hidden('codInf',$codInf) !!}
                        <div class="col-md-6 b-r">
                            
                            {!! Field::file('archivo') !!}

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::submit('CARGAR', ['class' => 'btn btn-primary btn-outline']) !!}
                                <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                            </div>
                            <div class="hr-line-dashed"></div>

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@stop
