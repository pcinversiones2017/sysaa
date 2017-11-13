@extends('layout.admin')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            EDITAR DATOS DE LA INSTITUCIÓN
        </div>
        <div class="panel-body">

                {!! Form::open(['method' => 'POST', 'route' => 'institucion.actualizar']) !!}
                {!! Field::hidden('codIns', $institucion->codIns) !!}
                {!! Field::text('nombre', $institucion->nombre, ['label' => 'NOMBRE DE LA INSTITUCIÓN']) !!}
                {!! Field::text('direccion', $institucion->direccion, ['label' => 'DIRECCIÓN']) !!}
                {!! Field::text('ruc', $institucion->ruc, ['label' => 'RUC']) !!}
                {!! Field::text('telefono', $institucion->telefono, ['label' => 'TELÉFONO']) !!}
                {!! Field::text('denominacion_anio', $institucion->denominacion_anio, ['label' => 'DENOMINACIO DEL AÑO ACTUAL']) !!}
                {!! Field::text('organo_control', $institucion->organo_control, ['label' => 'ORGANO DE CONTROL INSTITUCIONAL']) !!}

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-save"></i> ACTUALIZAR</button>
                    <a href="{!! route('institucion.listar') !!}" class="btn btn-danger btn-outline">ATRAS</a>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
@stop