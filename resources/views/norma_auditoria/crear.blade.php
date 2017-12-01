@extends('layout.admin')
@section('content')

@if($macroProcesos->isEmpty())
    <div class="alert alert-danger  alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        TIENE QUE <a class="alert-link" href="{{ route('macroproceso.crear') }}">CREAR </a> MACROPROCESOS PARA QUE PUEDA CONTINUAR
    </div>
@endif
<div class="panel panel-success">
    <div class="panel-heading">
        CREAR NORMATIVA APLICABLE A LA ENTIDAD Y MATERIA(S) A EXAMINAR
    </div>
    <div class="panel-body">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'norma-auditoria.guardar']) !!}
            <div class="col-md-12">
                {!! Form::hidden('codPlanF', $codPlanF) !!}
                <div class="col-md-3">
                    {!! Field::text('tipoNormativa') !!}

                </div>

                <div class="col-md-3">
                    {!! Field::text('numero') !!}
                </div>


                <div class="col-md-3">
                    <label class="">MacroProceso</label>
                    {!! Form::select('codMacroP', $macroProcesos, null, ['class' => 'form-control'] ) !!}
                </div>

                <div class="col-md-3">
                    {!! Field::date('fecha', \Carbon\Carbon::now()) !!}
                </div>
                <div class="col-md-12">
                    {!! Field::textarea('nombre', ['rows' => 2]) !!}
                </div>

                <div class="col-md-12 " style="margin-top: 20px;">
                    @if($macroProcesos->isNotEmpty())
                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> REGISTRAR</button>
                    @endif
                    <a href="{!! route('auditoria.mostrar', $codPlanF) !!}" class="btn btn-danger btn-outline">ATRAS</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

</div>
@stop