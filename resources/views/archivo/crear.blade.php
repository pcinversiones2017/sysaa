@extends('layout.admin')

@section('css-style')
{!! Html::style('css/plugins/summernote/summernote.css') !!}
{!! Html::style('css/plugins/summernote/summernote-bs3.css') !!}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cargar archivo</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        <strong>NOTA: PESO MAXIMO 5 MB</strong>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'auditor.archivo.registrar', 'files' => true]) !!}
                    {!! Form::hidden('codInf',$codInf) !!}
                        <div class="col-md-6 b-r">
                            
                            {!! Field::file('archivo') !!}

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                {!! Form::submit('CARGAR', ['class' => 'btn btn-primary btn-outline']) !!}
                                <a href="{!! url('auditor/informe/listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                                <a href="{!! url('auditor/archivo/listar/'.$codInf) !!}" class="btn btn-success btn-outline">VER DOCUMENTOS</a>
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
