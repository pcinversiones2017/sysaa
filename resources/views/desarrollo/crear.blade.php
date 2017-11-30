@extends('layout.admin')

@section('css-style')
{!! Html::style('https://summernote.org/bower_components/summernote/dist/summernote.css') !!}
@stop

@section('content')
    <div class="well"> 
        @if(!empty($proc->objetivogeneral->nombre))
        <strong> AUDITORIA </strong> : {!! $proc->objetivogeneral->auditoria->nombrePlanF !!} <br>
        <strong> OBJETIVO GENERAL </strong>: {!! $proc->objetivogeneral->nombre !!}
        @else
        <strong> AUDITORIA </strong> : {!! $proc->objetivoespecifico->objetivogeneral->auditoria->nombrePlanF !!} <br>
        <strong> OBJETIVO GENERAL </strong> : {!! $proc->objetivoespecifico->objetivogeneral->nombre !!} <br>
        <strong> OBJETIVO ESPECIFICO  </strong>: {!! $proc->objetivoespecifico->nombre !!}
        @endif
    </div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    CREAR DESARROLLO
                </div>
                <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'auditor.desarrollo.registrar']) !!}
                        {!! Form::hidden('codProc', $proc->codProc) !!}
                        {!! Field::text('detalle de procedimiento', $proc->detalle, ['class' => 'form-control', 'disabled']) !!}
                        {!! Field::textarea('informe', ['class' => 'summernote', 'label' => 'Desarrollo de Procedimiento']) !!}
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