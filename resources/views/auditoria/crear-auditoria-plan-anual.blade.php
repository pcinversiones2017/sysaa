@extends('layout.admin')
@section('content')
    @include('partials.alert')
    <div class="panel panel-success">
        <div class="panel-heading">
        CREACION DE ACTIVIDADES DEL {{$plan->nombrePlan}}
        </div>
        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => 'auditoria.guardar']) !!}
            {!! Field::hidden('codPlanA', $plan->codPlanA) !!}
            {!! Field::text('nombrePlanF', ['label' => 'NOMBRE AUDITORIA']) !!}

            <div class="form-group">
                <label>TIPO DE ACTIVIDAD</label>
                <select name="programacion" class="form-control">
                    <option value="PROGRAMADA">PROGRAMADA</option>
                    <option value="NO PROGRAMADA">NO PROGRAMADA</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline btn-success"><i class="fa fa-save"></i> GUARDAR</button>
                <a href="{!! route('plan.listar') !!}" class="btn btn-danger btn-outline">SALIR</a>
            </div>

            {!! Form::close() !!}
        </div>

    </div>
@stop