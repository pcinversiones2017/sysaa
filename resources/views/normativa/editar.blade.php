@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR NORMATIVA QUE REGULA LA AUDITORÍA DE CUMPLIMIENTO
        </div>
        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => 'normativa.actualizar']) !!}
            @foreach($normativas as $normativa)
            <input type="hidden" value="{{$normativa->codNorm}}" name="codNorm">
            <div class="col-md-12">

                <div class="col-md-3">
                    {!! Field::text('tipoNormativa',$normativa->tipoNormativa) !!}

                </div>

                <div class="col-md-3">
                    {!! Field::text('numero',$normativa->numero) !!}
                </div>
                <div class="col-md-3">
                    {!! Field::date('fecha',$normativa->fecha) !!}
                </div>
                <div class="col-md-12">
                    {!! Field::textarea('nombre', $normativa->nombre, ['rows' => 2]) !!}
                </div>
            @endforeach
                <div class="col-md-6" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>

                </div>
            </div>
        </div>

    </div>


@stop