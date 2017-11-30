@extends('layout.admin')

@section('css-style')
{!! Html::style('https://summernote.org/bower_components/summernote/dist/summernote.css') !!}
@stop

@section('content')
	<div class="panel panel-success">
        <div class="panel-heading">
            CREAR SEGUIMIENTO
        </div>
        <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'seguimiento.registrar']) !!}
                    {!! Form::hidden('codObs',$codObs) !!}
                    {!! Field::textarea('acciones', ['class' => 'summernote', 'label' => 'Acciones realizadas por el auditado']) !!}
                    {!! Field::textarea('evaluacion', ['class' => 'summernote', 'label' => 'Evaluacion del Auditor']) !!}
                    <div class="form-group">
                    {!! Form::label('Estado') !!}
                    {!! Form::select('estado', ['PENDIENTE' => 'PENDIENTE', 'PROCESO' => 'PROCESO', 'IMPLEMENTADO' => 'IMPLEMENTADO'], null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('REGISTRAR', ['class' => 'btn btn-success btn-outline']) !!}
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
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