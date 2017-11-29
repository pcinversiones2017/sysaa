@extends('layout.admin')

@section('css-style')
{!! Html::style('https://summernote.org/bower_components/summernote/dist/summernote.css') !!}
@stop

@section('content')
	<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                ACTUALIZAR DESARROLLO
            </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'auditor.desarrollo.actualizar']) !!}
                    {!! Form::hidden('codProc',$codProc) !!}
                    {!! Form::hidden('codDes',$desarrollo->codDes) !!}
                    {!! Field::textarea('informe', $desarrollo->informe , ['class' => 'summernote']) !!}
                    {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-primary btn-outline']) !!}
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    {!! Form::close() !!}
                </div>
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