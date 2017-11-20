@extends('layout.admin')

@section('css-style')
{!! Html::style('https://summernote.org/bower_components/summernote/dist/summernote.css') !!}
@stop

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Crear Observacion del Desarrollo de procedimiento </h5>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'seguimiento.registrar']) !!}
                    {!! Form::hidden('codDes',$codDes) !!}
                    {!! Form::hidden('codProc',$codProc) !!}
                    {!! Form::hidden('codObs',$codObs) !!}
                    {!! Field::textarea('acciones', ['class' => 'summernote', 'label' => 'Acciones realizadas por el auditado']) !!}
                    {!! Field::textarea('evaluacion', ['class' => 'summernote', 'label' => 'Evaluacion del Auditor']) !!}
                    <div class="form-group">
                    {!! Form::label('Estado') !!}
                    {!! Form::select('estado', ['PENDIENTE' => 'PENDIENTE', 'PROCESO' => 'PROCESO', 'IMPLEMENTADO' => 'IMPLEMENTADO'], null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('REGISTRAR', ['class' => 'btn btn-primary btn-outline']) !!}
                    <a href="{!! url('auditor/procedimiento/mostrar/'. $codProc) !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js-script')

    {!! Html::script('https://summernote.org/bower_components/summernote/dist/summernote.js') !!}
    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                height: 450,
            });

       });
    </script>
@endsection