@extends('layout.admin')

@section('css-style')
{!! Html::style('https://summernote.org/bower_components/summernote/dist/summernote.css') !!}
@stop

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Crear informe </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    {!! Form::open(['method' => 'POST', 'route' => 'auditor.informe.registrar']) !!}
                    {!! Form::hidden('codProc',$codProc) !!}
                    {!! Field::textarea('informe', ['class' => 'summernote']) !!}
                    {!! Form::submit('REGISTRAR', ['class' => 'btn btn-primary btn-outline']) !!}
                    <a href="{!! url('auditor/procedimiento/procedimientos-listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                    <a href="{!! url('informe/informe/'.$codProc) !!}" class="btn btn-success btn-outline">LISTAR</a>
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